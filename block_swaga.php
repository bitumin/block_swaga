<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Form for editing swaga block instances.
 *
 * @package   block_swaga
 * @copyright 1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_swaga extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_swaga');
    }

    /**
     * Always hide the view of this block (because it is not a "real" block)
     * @return bool
     */
    public function is_empty() {
        return true;
    }

    /**
     * Enable admin settings page
     * @return bool
     */
    public function has_config() {
        return true;
    }

    /**
     * This block will be instanced everywhere on plugin installation, therefore it will never appear listed in
     * the "Add a block" list
     * @return array
     */
    public function applicable_formats() {
        return array('all' => true);
    }

    /**
     * Disallow any kind of block instance settings edition
     * @return bool
     */
    public function user_can_edit() {
        return false;
    }

    /**
     * Here we do the magic!
     * (1) Returns null to prevent the actual block from showing anywhere (since it is not a "real" block)
     * (2) In typical layouts this method is usually called soon after the $OUTPUT->header(),
     *     so it seems a good place to print our custom content.
     * @param $output
     * @return null
     * @throws dml_exception
     */
    public function get_content_for_output($output) {
        $announcementenabled = (bool) get_config('block_swaga', 'enabled');
        if ($announcementenabled) {
            echo html_writer::div(get_config('block_swaga', 'text'), 'annoying_announcement');
        }

        return null;
    }

    /**
     * Add custom javascript
     */
    function get_required_javascript() {
        parent::get_required_javascript();
        $arguments = array(
            'instanceid' => $this->instance->id
        );
        $this->page->requires->string_for_js('viewallcourses', 'moodle');
        $this->page->requires->js_call_amd('block_navigation/navblock', 'init', $arguments);
    }
}

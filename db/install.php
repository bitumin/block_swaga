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
 * Swaga block installation.
 *
 * @since Moodle 2.0
 * @package block_swaga
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @return void
 * @throws dml_exception
 */
function xmldb_block_swaga_install() {
    global $DB;

    $now = time();
    $DB->insert_record('block_instances', (object) [
        'blockname' => 'swaga',
        'parentcontextid' => '1',
        'showinsubcontexts' => '1',
        'requiredbytheme' => '0',
        'pagetypepattern' =>  '*',
        'defaultregion' =>  '',
        'defaultweight' => 0,
        'timecreated' => $now,
        'timemodified' => $now,
    ]);
}

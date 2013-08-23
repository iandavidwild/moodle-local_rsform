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
 * Add page to admin menu.
 *
 * @package    local_rsform
 * @copyright  2013 Leicestershire Health Informatics Service
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) { // needs this condition or there is error on login page

    $settings = new admin_settingpage('local_rsform',
        get_string('pluginname', 'local_rsform'));

    //Database connection header.
    $settings->add(new admin_setting_heading('local_rsform/exdbheader', get_string('settingsheaderdb', 'local_rsform'), get_string('settingshelp', 'local_rsform')));
    
    $settings->add(new admin_setting_configtext('local_rsform/sourcedomain', get_string('sourcedomain', 'local_rsform'), '', '', PARAM_TEXT));
    
    // Add link to configuration page.
    $ADMIN->add('localplugins', $settings);
}
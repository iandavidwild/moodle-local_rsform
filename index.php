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

require_login();

$PAGE->set_url('/local/rsform/index.php');
$context = get_context_instance(CONTEXT_SYSTEM);
$PAGE->set_context($context);
$PAGE->set_title(get_string('testpage_title', 'local_rsform'));

$output = $OUTPUT->header();
$output .= $OUTPUT->heading(get_string('testpage_title', 'local_rsform'));

$hassiteconfig = has_capability('moodle/site:config', $context);

if($hassiteconfig) {
    // Link to settings page...
    $output .= html_writer::start_tag('div', array('class'=>'in-page-controls'));
    $output .= html_writer::start_tag('p', array('class='=>'settings'));
    $output .= html_writer::start_tag('a', array('href'=>$CFG->wwwroot.'/admin/settings.php?section=local_rsform'));
    $output .= get_string('general_settings', 'local_rsform');
    $output .= html_writer::start_tag('span');
    $output .= html_writer::start_tag('i');
    $output .= html_writer::end_tag('i');
    $output .= html_writer::end_tag('span');
    $output .= html_writer::end_tag('a');
    $output .= html_writer::end_tag('p');
    $output .= html_writer::end_tag('div');
}

$output .= $OUTPUT->footer();

echo $output;
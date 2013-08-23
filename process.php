<?php

require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->dirroot . '/cohort/lib.php');

// Only accept requests from the nhs.uk domain
echo '<p>HTTP_ORIGIN: '.$_SERVER['HTTP_ORIGIN'].'<p>';

$sourcedomain = get_config('local_rsform', 'sourcedomain');

if(strcmp($_SERVER['HTTP_ORIGIN'], $sourcedomain) == 0) {
	// What task are we trying to achieve?
	echo '<p>Task:'.$_POST['Task'].'<p>';
	if(strcmp($_POST['Task'],'AddToCohort') == 0) {
		$cohort_name = $_POST['Cohort'];
		// Get cohort details
		global $DB;
		
		$cohort = $DB->get_record('cohort', array('name'=>$cohort_name));
		
		if(!empty($cohort)) {
			// get user id
			$email = $_REQUEST['RSEProEmail'];
			$user = $DB->get_record('user', array('email'=>$email));
			
			if(!empty($user)) {
				cohort_add_member($cohort->id, $user->id);
			}
		}
	}
} else {
	echo '<p>Who goes there?<p>'; 
}

?>
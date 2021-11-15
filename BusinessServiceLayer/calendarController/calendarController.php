<?php
require_once  __DIR__ . '/../calendarModel/calendarModel.php';

class calendarController
{
	function add()
	{
		$calendar = new calendarModel();
		$calendar->title = $_POST['title'];
        $calendar->start_event = $_POST['start_event'];
        $calendar->end_event = $_POST['end_event'];


        if ($calendar->add()){
        	echo "<script>alert('Added Successfully')</script>";

        }
        
	}

	function view()
	{
		
		$calendar = new calendarModel();
		return $calendar->view();

	}


}

?>

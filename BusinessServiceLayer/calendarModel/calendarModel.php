<?php
require_once '../../libs/database.php';

class calendarModel
{
	public $id, $title, $start_event, $end_event; 

	function view()
	{
		$sql = "SELECT * FROM events ORDER BY id";
        $args = [':id' => $this->id];
        return DB::run($sql, $args);
	}

	function add()
	{
		$sql = "INSERT events (title, start_event, end_event) values (:title, :start_event, :end_event)";

        $args = [':title' => $this->title, ':start_event' => $this->start_event, ':end_event' => $this->end_event];
        $result = DB::run($sql, $args);
	}


}

?>
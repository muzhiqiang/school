<?php

class classUnion {

	public function __construct() {

	}

	public function addClassAction() {

		require './model/classItem.php';
		$info = new classItem();
		$arg = array('Class_ID', 'Dept', 'Grade', 'Year', 'Class_name', 'Major', 'Sta_ID', 'Intro');
		foreach($arg as $tmp) {
			$info->$tmp = $_POST[$tmp];
		}
		$info->save();

	}

	
	// remove the class menber first
	public function removeClassAction() {

	}

	public function addClassLeaderAction() {

	}


}

?>

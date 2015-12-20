<?php

require 'pod.php';

class studentcourseItem {

	public $Course_ID;
	public $Stu_ID;
	public $Score;
	public $Is_Fail;

	public function __construct() {

	}

	public function load() {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}

		$row = $db->query('select * from course where Course_ID = \''.$this->Course_ID.'\' ;');
		if(count($row) == 0) {
			$db->close();
			throw new Exception($Course_ID.'doesn\'t exist');
		}

		$this->Course_ID = $row['Course_ID'];
		$this->Stu_ID = $row['Stu_ID'];
		$this->Score = $row['Score'];
		$this->Is_Fail = $row['Is_Fail'];
		$db->close();
	}

	public function save() {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('insert into stu_course (Course_ID, Stu_ID, Score, Is_Fail) values(\''.this->Course_ID.'\'
		, \''.this->Stu_ID.'\', \''.this->Score.'\', \''.this->Is_Fail.'\';');
		
		$db->close();

	}

	public function update($arg) {
	
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$req = array('Course_ID' => $this->Course_ID, 'Stu_ID' => $this->Stu_ID);
		$table = 'stu_course';
		$sql = $db->genUpdateSql($reqm $arg, $table);
		$db->query($sql);
		$db->close();
	
	}

	public function search($req, $arg) {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'stu_course';
		$sql = $db->genSearchSql($reqm $arg, $table);
		$res = $db->query($sql);
		return $res;
	}

	public function studentcourseLinkCourse($req, $lk, $arg) {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}

		$map = array('studentcourseItem' => 'stu_course', 'CourseItem' =>'course');
		$table = array('stu_course', 'course');

		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}


}

?>

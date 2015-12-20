<?php

require './model/courseItem.php'
require './model/studentcourseItem.php'

class course {

	public function __construct() {

	}

	// show the course list according Cousrse name and Course_year_term
	// Argument Course_year_name
	public function showYearCourse() {
		
		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}	
		$course = new cousrseItem();
		$req = array();
		$req[0] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' =>'courseItem');
		$arg = array('Course', 'Course_ID', 'Tea_name', 'Classroom','Teach_time', 'Total_time', 'Property', 'Course_year_term', 'Credit');
		$lk = array('Tea_ID');
		$res = $course->courseLinkTeacher($req, $lk, $arg);

		return $res;
	}

	// show the course list accoding Property and Course_year_term
	// Argument Property, Course_year_term
	public function showYearPropertyCourse() {
		
		if(!isset($_POST['Award_ID']) ||!isset($_POST['Property'])) {
			throw new Exception('Argument not set');
		}
		$course = new cousrseItem();
		$req = array();
		$req[0] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' =>'courseItem');
		$req[1] = array('key' => 'Property', 'Property' => $_POST['Property']; 'table' =>'courseItem');
		$arg = array('Course', 'Course_ID', 'Tea_name', 'Classroom','Teach_time', 'Total_time', 'Property', 'Course_year_term', 'Credit');
		$lk = array('Tea_ID');
		$res = $course->courseLinkTeacher($req, $lk, $arg);

		return $res;
	}
		
	//select course
	// Argument Course_ID

	// TODO:: big problem How to select
	public function selectCourse() {
		
		if(!isset($_POST['Course_ID'])) {
			throw new Exception('Argument not set');
		}
		$sc = new studentcourseItem();
		$sc->Course_ID = $_POST['Course_ID'];
		$sc->Stu_ID = $_SESSION['Account'];
		$sc->Score = '-1';
		$sc->Is_Fail = 0;

		$sc->save();
	}

	//show all course that student selected
	public function showStudentAllCourse() {

		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}
		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account'], 'table' => 'studentcourseItem');
		$arg = array('Course_ID', 'Course', 'Property', 'Course_year_term', 'Credit');
		$lk = array('Course_ID');
		$res = $sc->studentcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

	//Show the coure accoding to stu_id and course_year_term
	// Argument : Stu_ID, Course_year_term
	public function showStudentYearCourseTable() {

		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}	
		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account'], 'table' => 'studentcourseItem');
		$req[1] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' => 'studentcourseItem');
		$arg = array('Course_ID', 'Course', 'Property', 'Credit', 'Classroom', 'Teach_time', 'Total_time');
		$lk = array('Course_ID');
		$res = $sc->studentcourseLinkCourse($req, $lk, $arg);
		usort($res, function($a, $b) {
			if($a['Tech_time'] == $b['Tech_time'])
				return 0;
			return ($a['Tech_time'] >$b['Tech_time'])?-1:1;
		});
		return $res;
	}

	// show the info and the socre of course accoding std_id
	public function showStudentAllCourseScore() {

		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account'], 'table' => 'studentcoursrItem');
		$arg = array('Course_ID', 'Course', 'Property', 'Course_year_term', 'Credit', 'Score', 'Is_Fail');
		$lk = array('Course_ID');
		$res = $sc->studnetcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

	// show the info and score of course accoding stu_id and course_year_term
	// Argument stu_id, course_year_term
	public function showStudentYearCourseScore() {

		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}
		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account'], 'table' => 'studentcoursrItem');
		$req[1] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' => 'studentcourseItem');
		$lk = array('Course_ID');
		$arg = array('Course_ID', 'Course', 'Property', 'Course_year_term', 'Credit', 'Score', 'Is_Fail');
		$lk = array('Course_ID');
		$res = $sc->studnetcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

}


?>

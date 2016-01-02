<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/courseItem.php';
require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/studentcourseItem.php';
require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class course {

	private $util_;

	public function __construct() {

		$this->util_ = new Util();
	}

	// add course
	// argument course info
	public function addCourseAction() {

		$arg = array('Course', 'Tea_ID', 'Classroom', 'Teach_time', 'Total_time', 'Course_year_term', 'Property', 'Credit', 'Intro');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'CourseItem', $default);
	}

	public function showDetailCourseAction() {

		if(!isset($_POST['Course_ID'])) {
			throw new Exception('Argument not set');
		}	
		$course = new courseItem();
		$req = array();
		$req[0] = array('key' => 'Course_ID', 'Course_ID' => $_POST['Course_ID'], 'table' =>'courseItem');
		$arg = array('Course', 'Tea_name', 'Total_time', 'Property', 'intro', 'Credit');
		$lk = array('Tea_ID');
		$res = $course->courseLinkTeacher($req, $lk, $arg);

		return $res;

	}

	// show the course list according Cousrse name and Course_year_term
	// Argument Course_year_name
	public function showYearCourseAction() {
		
		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}	
		$course = new courseItem();
		$req = array();
		$req[0] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' =>'courseItem');
		$arg = array('Course', 'Course_ID', 'Tea_name', 'Teach_time', 'Total_time', 'Property', 'Credit', 'intro');
		$lk = array('Tea_ID');
		$res = $course->courseLinkTeacher($req, $lk, $arg);

		return $res;
	}

	// show the course list accoding Property and Course_year_term
	// Argument Property, Course_year_term
	public function showYearPropertyCourseAction() {
		
		if(!isset($_POST['Course_year_term']) ||!isset($_POST['Property'])) {
			throw new Exception('Argument not set');
		}
		$course = new cousrseItem();
		$req = array();
		$req[0] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' =>'courseItem');
		$req[1] = array('key' => 'Property', 'Property' => $_POST['Property'], 'table' =>'courseItem');
		$arg = array('Course', 'Course_ID', 'Tea_name', 'Classroom','Teach_time', 'Total_time', 'Property', 'Course_year_term', 'Credit');
		$lk = array('Tea_ID');
		$res = $course->courseLinkTeacher($req, $lk, $arg);

		return $res;
	}
		
	//select course
	// Argument Course_ID

	// TODO:: big problem How to select
	public function selectCourseAction() {
		
		if(!isset($_POST['Course_ID'])) {
			throw new Exception('Argument not set');
		}
		$sc = new studentcourseItem();
		$sc->Course_ID = $_POST['Course_ID'];
		$sc->Stu_ID = $_POST['Account'];
		$sc->Score = '-1';
		$sc->Is_Fail = 0;

		$sc->save();
	}

	//show all course that student selected
	public function showStudentAllCourseAction() {

		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}
		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account'], 'table' => 'studentcourseItem');
		$arg = array('Course_ID', 'Course', 'Property', 'Course_year_term', 'Credit');
		$lk = array('Course_ID');
		$res = $sc->studentcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

	//Show the coure accoding to stu_id and course_year_term
	// Argument : Stu_ID, Course_year_term
	public function showStudentYearCourseTableAction() {

		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}	
		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account'], 'table' => 'studentcourseItem');
		$req[1] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' => 'courseItem');
		//$arg = array('Course_ID', 'Course', 'Property', 'Credit', 'Classroom', 'Teach_time', 'Total_time');
		$arg = array('Course_ID', 'Course', 'Classroom', 'Teach_time');
		$lk = array('Course_ID');
		$res = $sc->studentcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

	// show the info and the socre of course accoding std_id
	public function showStudentAllCourseScoreAction() {

		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account'], 'table' => 'studentcoursrItem');
		$arg = array('Course_ID', 'Course', 'Property', 'Course_year_term', 'Credit', 'Score', 'Is_Fail');
		$lk = array('Course_ID');
		$res = $sc->studnetcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

	// show the info and score of course accoding stu_id and course_year_term
	// Argument stu_id, course_year_term
	public function showStudentYearCourseScoreAction() {

		if(!isset($_POST['Course_year_term'])) {
			throw new Exception('Argument not set');
		}
		$sc = new studentcourseItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account'], 'table' => 'studentcoursrItem');
		$req[1] = array('key' => 'Course_year_term', 'Course_year_term' => $_POST['Course_year_term'], 'table' => 'studentcourseItem');
		$lk = array('Course_ID');
		$arg = array('Course_ID', 'Course', 'Property', 'Course_year_term', 'Credit', 'Score', 'Is_Fail');
		$lk = array('Course_ID');
		$res = $sc->studnetcourseLinkCourse($req, $lk, $arg);

		return $res;
	}

}


?>

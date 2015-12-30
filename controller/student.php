<?php

require 'util.php';

class student {

	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	// show student's basic info , identify info and class info
	public function showInfoAction() {

		$arg = array('Stu_ID', 'Stu_name', 'Sex', 'Class_ID');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'studentInfoItem');

		$arg = array('Loc', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place', 
		'Tel', 'Health', 'Enroll_time', 'Intro');
		$identify = $this->util_->searchRecord($req, $arg, 'studentIdentifyItem');

		foreach($arg as $tmp) {
			$res[$tmp] = $identify[$tmp];
		}

		$arg = array('Dept', 'Grade', 'Year', 'Class_name', 'Major');
		$req[0] = array('key' => 'Class_ID', 'Class_ID' => $res['Class_ID']);
		unset($res['Class_ID']);
		$class = $this->util_->searchRecord($req, $arg, 'classItem');
		foreach($arg as $tmp) {
			$res[$tmp] = $class[$tmp];
		}

		return $res;
	
	}

	// update student identify info
	// argument only for identify info
	public function updateInfoAction() {

		require './model/studentIdentifyItem.php';
		
		$identify = new studentIdentifyItem();
		$identify->Stu_ID = $_SESSION['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			if(!property_exists($identify, $key)) {
				continue;
			}
			array[$key] = $value;
		}
		$identify->update($arg);
	}

	// add student item
	// Argument base info, identify info Class_ID
	// init password = '000000'
	public function addStudentAction() {

		$arg = array('Stu_ID', 'Stu_name', 'Sex', 'Class_ID');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'studentInfoItem', $default);

		$arg = array('Stu_ID', 'Loc', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place', 'Tel',
		'Health', 'Entroll_time', 'Intro');
		$default['Password'] = '000000';
		$this->util_->addRecord($arg, $_POST, 'studentIdentifyItem', $default);		
	}

	//TODO:: info, identify, group delete
	public function removeStudentAction() {

	
	}

	// change password for student themselves
	// Argument old password OP, new password NP
	public function changePasswordAction() {

		require './model/studentIdentifyItem.php';

		$this->util_->requireArg('OP');
		$this->util_->requireArg('NP');
		$identify = new studentIdentifyItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account'])
		$arg = array('Password');
		$res = $identify->search($req, $arg);
		
		if($res[0]['Password'] != $_POST['OP']) {
			throw new Exception('Password wrong');
		}

		$identify->Stu_ID = $_SESSION['Account'];
		$arg1 = array('Password' => $_POST['NP']);
		$identify->update($arg1);
	}





}

?>

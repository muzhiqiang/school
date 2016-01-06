<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class student {

	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	// show student's basic info , identify info and class info
	public function showInfoAction() {

		$arg = array('stu_id', 'stu_name', 'sex', 'class_id');
		$req = array();

		//echo $_POST['Account'];
		$req[0] = array('key' => 'stu_id', 'stu_id' => $_POST['Account']);
		$info = $this->util_->searchRecord($req, $arg, 'studentInfoItem');

		$res = array();
		foreach($arg as $tmp) {
			$res[$tmp] = $info[0][$tmp];
		}
		$arg = array('loc', 'birth', 'id_no', 'race', 'polit', 'native_place', 
		'tel', 'health', 'enroll_time', 'intro');
		$identify = $this->util_->searchRecord($req, $arg, 'studentIdentityItem');
		
		foreach($arg as $tmp) {
			$res[$tmp] = $identify[0][$tmp];
		}

		$arg = array('dept', 'grade', 'year', 'class_name', 'major');
		$req[0] = array('key' => 'class_id', 'class_id' => $res['class_id']);
		unset($res['class_id']);
		$class = $this->util_->searchRecord($req, $arg, 'classItem');
		foreach($arg as $tmp) {
			$res[$tmp] = $class[0][$tmp];
		}

		return $res;
	
	}

	// update student identify info
	// argument only for identify info
	public function updateInfoAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/studentIdentityItem.php';
		
		$identify = new studentIdentityItem();
		$identify->Stu_ID = $_POST['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			if(!property_exists($identify, $key)) {
				continue;
			}
			$arg[$key] = $value;
		}
		return $identify->update($arg);
	}

	// add student item
	// Argument base info, identify info Class_ID
	// init password = '000000'
	public function addStudentAction() {

		$arg = array('Stu_ID', 'Stu_name', 'Sex', 'Class_ID');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'studentInfoItem', $default);

		$arg = array();
		$default['Password'] = '000000';
		$default['Stu_ID'] = $_POST['Stu_ID'];
		$this->util_->addRecord($arg, $_POST, 'studentIdentityItem', $default);		
	}

	//TODO:: info, identify, group delete
	public function removeStudentAction() {

	
	}

	// change password for student themselves
	// Argument old password OP, new password NP
	public function changePasswordAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/studentIdentityItem.php';

		$this->util_->requireArg('OP');
		$this->util_->requireArg('NP');
		$identify = new studentIdentifyItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account']);
		$arg = array('Password');
		$res = $identify->search($req, $arg);
		
		if($res[0]['Password'] != $_POST['OP']) {
			throw new Exception('Password wrong');
		}

		$identify->Stu_ID = $_POST['Account'];
		$arg1 = array('Password' => $_POST['NP']);
		$identify->update($arg1);
	}

	public function studentListAction() {

		$this->util_->requireArg('Class_ID', $_POST);
		$arg = array("Stu_ID", "Stu_name", "Sex");
		$req = array();
		$req[0] = array('key' => 'Class_ID', 'Class_ID' => $_POST['Class_ID']);
		return $this->util_->searchRecord($req, $arg, 'studentInfoItem');

	}





}

?>

<?php

require './model/studentInfoItem.php';
require './model/studentIdentifyItem.php';
require './model/classItem.php';

class student {

	public function __construct() {

	}

	public function showInfoAction() {
		
		$info = new studentInfoItem();
		$identify = new studentIdentifyItem();
		$class = new classItem();
		
		$info->load($_SESSION['Account']);
		$identify->load($_SESSION['Account']);
		$class->load($info->Class_ID);

		$res = array();
		$res['Stu_ID'] = $info->Stu_ID;
		$res['Stu_name'] = $info->Stu_name;
		$res['Sex'] = $info->Sex;
		$res['Loc'] = $identify->Loc;
		$res['Birth'] = $identify->Birth;
		$res['ID_no'] = $identify->ID_no;
		$res['Race'] = $identify->Race;
		$res['Polit'] = $identify->Polit;
		$res['Native_place'] = $identify->Native_place;
		$res['Tel'] = $identify->Tel;
		$res['Health'] = $identify->Health;
		$res['Enroll_time'] = $identify->Enroll_time;
		$res['Intro'] = $identify->Intro;
		$res['Dept'] = $class->Dept;
		$res['Grade'] = $class->Grade;
		$res['Year'] = $class->Year;
		$res['Class_name'] = $class->Class_name;
		$res['Major'] = $class->Major;

		return $res;
	
	}

	public function updateInfoAction() {

		$identify = new studentIdentifyItem();
		$identify->Stu_ID = $_SESSION['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			array[$key] = $value;
		}
		$identify->update($arg);
	}

	public function addStudentAction() {

		$info = new studentInfoItem();
		$identify = new studentIdentifyItem();
		$info->Stu_ID = $_POST['Stu_ID'];
		$info->Stu_name = $_POST['Stu_name'];
		$info->Sex = $_POST['Sex'];
		$info->Class_ID = $_POST['Class_ID'];
		$info->save();
		
		$identify->Stu_ID = $_POST['Stu_ID'];
		$identify->Loc = $_POST['Loc'];
		$identify->Birth = $_POST['Birth'];
		$identify->ID_no = $_POST['ID_no'];
		$identify->Race = $_POST['Race'];
		$identify->Polit = $_POST['Polit'];
		$identify->Native_place = $_POST['Native_place'];
		$identify->Tel = $_POST['Tel'];
		$identify->Health = $_POST['Health'];
		$identify->Entroll_time = $_POST['Entroll_time'];
		$identify->Intro = $_POST['Intro'];
		$identify->Passwrod = '00000';
		$identify->save();
	}

	//TODO:: info, identify, group delete
	public function removeStudentAction() {

	
	}

	public function changePasswordAction() {

		$identify = new studentIdentifyItem();
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_SESSION['Account']);
		$arg = array('Password');
		$res = $identify->search($req, $arg);
		
		if($res[0]['Password'] != $_POST['OP']) {
			throw new Exception('Password wrong');
		}

		$arg1 = array('Password' => $_PSOT['NP']);
		$identify->update($req, $arg1);
	}





}

?>

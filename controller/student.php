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
		$res['Loc'] = $identify->Stu_ID;
		$res['Birth'] = $identify->Birth;
		$res['ID_no'] = $identify->ID_no;
		$res['Race'] = $identify->Race;
		$res['Polit'] = $identify->Polit;
		$res['Native_place'] = $identify->Native_place;
		$res['Tel'] = $identify->Tel;
		$res['Health'] = $identify->Health;
		$res['Enrool_time'] = $identify->Enroll_time;
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



}

?>

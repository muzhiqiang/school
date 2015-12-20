<?php

require './model/teacherInfoItem.php';
require './model/teacherIdentifyItem.php';

class teacher {

	public function __construct() {

	}

	public function showInfoAction() {
		
		$info = new teacherInfoItem();
		$identify = new teacherIdentifyItem();
		
		$info->load($_SESSION['Account']);
		$identify->load($_SESSION['Account']);

		$res = array();
		$res['Tea_ID'] = $info->Tea_ID;
		$res['Tea_name'] = $info->Tea_name;
		$res['Sex'] = $info->Sex;
		$res['Rank'] = $info->Rank;
		$res['Entry_time'] = $info->Entry_time;		
		$res['Address'] = $identify->Address;
		$res['Birth'] = $identify->Birth;
		$res['ID_no'] = $identify->ID_no;
		$res['Race'] = $identify->Race;
		$res['Polit'] = $identify->Polit;
		$res['Native_place'] = $identify->Native_place;
		$res['Tel'] = $identify->Tel;
		$res['Health'] = $identify->Health;
		$res['Experience'] = $identify->Experience;
		$res['Intro'] = $identify->Intro;

		return $res;
	
	}

	public function updateInfoAction() {

		$identify = new teacherIdentifyItem();
		$identify->Tea_ID = $_SESSION['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			array[$key] = $value;
		}
		$identify->update($arg);
	}



}

?>

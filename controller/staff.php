<?php

require './model/staffInfoItem.php';
require './model/staffIdentifyItem.php';

class staff {

	public function __construct() {

	}

	public function showInfoAction() {
		
		$info = new staffInfoItem();
		$identify = new staffIdentifyItem();
		
		$info->load($_SESSION['Account']);
		$identify->load($_SESSION['Account']);

		$res = array();
		$res['Sta_ID'] = $info->Sta_ID;
		$res['Sta_name'] = $info->Sta_name;
		$res['Sex'] = $info->Sex;
		$res['Position'] = $info->Position;
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

		$identify = new staffIdentifyItem();
		$identify->Sta_ID = $_SESSION['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			array[$key] = $value;
		}
		$identify->update($arg);
	}



}

?>

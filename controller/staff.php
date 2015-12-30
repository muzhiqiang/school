<?php

require 'util.php'

class staff {

	private $util_;

	public function __construct() {
		
		$this->util_ = new Util();
	}

	// show staff basic info and identify info
	public function showInfoAction() {
		
		$arg = array('Sta_ID', 'Sta_name', 'Sex', 'Position', 'Entry_time');
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_SESSION['Account'];
		$res = $this->util_->searchRecord($req, $arg, 'staffInfoItem');

		$arg = array('Address', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place'
		'Tel', 'Health', 'Experience', 'Intro');
		$identify = $this->util_->searchRecord($req, $arg, 'staffIdentifyItem');
		foreach($arg as $tmp) {
			$res[$tmp] = $identify[$tmp];
		}
		return $res;
	
	}

	// update the identify info
	// Argument: only the identify info
	public function updateInfoAction() {

		require './model/staffIdentifyItem.php';

		$identify = new staffIdentifyItem();
		$identify->Sta_ID = $_SESSION['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			if(!property_exists($identify, $key)) {
				continue;
			}
			array[$key] = $value;
		}
		$identify->update($arg);
	}

	// Add staff
	// basic info, identify info 
	// init password '000000'
	public function addStaffAction() {

		// TODO:: Authority
		$infoArg = array('Sta_ID', 'Sta_name', 'Sex', 'Position', 'Entry_time');
		$default = array('Authority' => 'default');
		$this->util_->addRecord($infoArg, $_POST, 'staffInfoItem', $default);
	
		$infoArg = array('Sta_ID', 'Address', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place', 'Tel', 'Health', 'Experience', 'Intro');
		$default = array('Password' => '000000');
		$this->util_->addRecord($infoArg, $_POST, 'staffIdentifyItem', $default);
	
	}

	//
	public function removeStaffAction() {

	}

	// change password for staff themselves
	// Argument old passeword, new password
	public function changePasswordAction() {

		$require './model/staffIdentifyItem.php';

		$identify = new staffIdentifyItem();
		$this->util_->requireArg('OP', $_POST);
		$this->util_->requireArg('NP', $_POST);
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_SESSION['Account'])
		$identify->Sta_ID = $_SESSION['Account'];
		$arg = array('Password');
		$res = $identify->search($req, $arg);
		
		if($res[0]['Password'] != $_POST['OP']) {
			throw new Exception('Password wrong');
		}

		$arg1 = array('Password' => $_PSOT['NP']);
		$identify->update($arg1);

	}



}

?>

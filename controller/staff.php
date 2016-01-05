<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class staff {

	private $util_;

	public function __construct() {
		
		$this->util_ = new Util();
	}

	// show staff basic info and identify info
	public function showInfoAction() {
		
		$arg = array('Sta_ID', 'Sta_name', 'Sex', 'Position', 'Entry_time');
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_POST['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'staffInfoItem');

		$arg = array('Address', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place',
		'Tel', 'Health', 'Experience', 'Intro');
		$identify = $this->util_->searchRecord($req, $arg, 'staffIdentityItem');
		foreach($arg as $tmp) {
			$res[0][$tmp] = $identify[0][$tmp];
		}
		return $res;
	
	}

	function positionAction() {

		$arg = array('Position');
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_POST['Account']);
		return $this->util_->searchRecord($req, $arg, 'staffInfoItem');
	}


	// update the identify info
	// Argument: only the identify info
	public function updateInfoAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/staffIdentityItem.php';

		$identify = new staffIdentityItem();
		$identify->Sta_ID = $_POST['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			if(!property_exists($identify, $key)) {
				continue;
			}
			$arg[$key] = $value;
		}
		$identify->update($arg);
	}

	// Add staff
	// basic info, identify info 
	// init password '000000'
	public function addStaffAction() {

		$infoArg = array('Sta_id', 'Sta_name', 'sex', 'Position', 'Entry_time');
		$default = array();
		$this->util_->addRecord($infoArg, $_POST, 'staffInfoItem', $default);
		$infoArg = array();
		$default = array('Sta_ID' => $_POST['Sta_id'], 'Password' => '000000');
		$this->util_->addRecord($infoArg, $_POST, 'staffIdentityItem', $default);
	
	}

	public function staffListAction() {

		$arg = array('Sta_ID', 'Sta_name', 'Position');
		$req = array();
		$req[0] = array('key' => 'Sex', 'Sex' => '男');
		$res = $this->util_->searchRecord($req, $arg, 'staffInfoItem');

		$req[0] = array('key' => 'Sex', 'Sex' => '女');
		$tmp = $this->util_->searchRecord($req, $arg, 'staffInfoItem');

		foreach($tmp as $t) {
			array_push($res, $t);
		}
		return $res;
	}

	//
	public function removeStaffAction() {

		$this->util_->requireArg('Sta_ID', $_POST);
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_POST['Sta_ID']);

		$this->util_->removeRecord($req, 'staffIdentityItem');
		$this->util_->removeRecord($req, 'staffInfoItem');

	}

	// change password for staff themselves
	// Argument old passeword, new password
	public function changePasswordAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/staffIdentityItem.php';

		$identify = new staffIdentityItem();
		$this->util_->requireArg('OP', $_POST);
		$this->util_->requireArg('NP', $_POST);
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_POST['Account']);
		$identify->Sta_ID = $_POST['Account'];
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

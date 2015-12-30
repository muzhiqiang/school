<?php


require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php'

class teacher {

	private $util_;

	public function __construct() {
		
		$this->util_ = new Util();
	}

	// show base info , identify info of the teacher
	public function showInfoAction() {
		
		$arg = array('Tea_ID', 'Tea_name', 'Sex', 'Rank', 'Entry_time');
		$req = array();
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_SESSION['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'teacherInfoItem');	
		
		$arg = array('Address', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place',
		'Tel', 'Health', 'Experience', 'Intro');
		$identify = $this->util_->serchRecord($req, $arg, 'teacherIdentifyItem');
		foreach($arg as $tmp) {
			$res[$tmp] = $identify[$tmp];
		}
		return $res;
	
	}

	// update identify info of teacher
	// Argument: only for the identify info
	public function updateInfoAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/teacherIdentifyItem.php';	

		$identify = new teacherIdentifyItem();
		$identify->Tea_ID = $_SESSION['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			array[$key] = $value;
		}
		$identify->update($arg);
	}

	// Add teacher
	// basic info, identify info 
	// init password '000000'
	public function addTeacherAction() {

		// TODO:: Authority
		$infoArg = array('Tea_ID', 'Tea_name', 'Sex', 'Rank', 'Entry_time');
		$default = array('Authority' => 'default');
		$this->util_->addRecord($infoArg, $_POST, 'teacherInfo', $default);

		$infoArg = array('Tea_ID', 'Address', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place', 'Tel', 'Health', 'Experience', 'Intro');
		$default['Password'] = '000000';
		$this->util_->addRecord($infoArg, $_POST, 'teacherIdentify', $default);
	}

	//
	public function removeTeacherAction() {

	}

	// change password for teacher themselves
	// Argument old passeword, new password
	public function changePasswordAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/teacherIdentifyItem.php';	

		$this->util_->requireArg('OP');
		$this->util_->requireArg('NP');
		$identify = new teacherIdentifyItem();
		$req = array();
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_SESSION['Account']);
		$arg = array('Password');
		$res = $identify->search($req, $arg);
		
		if($res[0]['Password'] != $_POST['OP']) {
			throw new Exception('Password wrong');
		}

		$identify->Tea_ID = $_SESSION['Account'];
		$arg1 = array('Password' => $_PSOT['NP']);
		$identify->update($arg1);

	}



}

?>

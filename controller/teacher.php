<?php


require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class teacher {

	private $util_;

	public function __construct() {
		
		$this->util_ = new Util();
	}

	// show base info , identify info of the teacher
	public function showInfoAction() {
		
		$arg = array('Tea_ID', 'Tea_name', 'Sex', 'Rank', 'Entry_time');
		$req = array();
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_POST['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'teacherInfoItem');	
		
		$arg = array('Address', 'Birth', 'ID_no', 'Race', 'Polit', 'Native_place',
		'Tel', 'Health', 'Experience', 'Intro');
		$identify = $this->util_->searchRecord($req, $arg, 'teacherIdentityItem');
		foreach($arg as $tmp) {
			$res[$tmp] = $identify[0][$tmp];
		}
		return $res;
	
	}

	public function committeeListAction() {

		$arg = array('Tea_ID', 'Tea_name', 'Sex');
		$req = array();
		$req[0] = array('key' => 'Authority', 'Authority' => '1');
		return $this->util_->searchRecord($req, $arg, 'teacherInfoItem');
	}

	public function teacherListAction() {

		$arg = array('Tea_ID', 'Tea_name', 'Sex', 'Rank', 'Entry_time');
		$req = array();
		return $this->util_->searchRecord($req, $arg, 'teacherInfoItem');
	}

	public function getAuthorityAction() {

		$arg =array('Authority');
		$req = array();
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_POST['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'teacherInfoItem');
		return $res;
	}

	// update identify info of teacher
	// Argument: only for the identify info
	public function updateInfoAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/teacherIdentityItem.php';	

		$identify = new teacherIdentityItem();
		$identify->Tea_ID = $_POST['Account'];
		$arg = array();
		foreach($_POST as $key => $value) {
			if(!property_exists($identify, $key)) {
				continue;
			}
			$arg[$key] = $value;
		}
		$identify->update($arg);
	}

	public function addLeaderAction() {

		$key = array('Tea_ID');
		$arg = array('Authority');
		$default = array();
		$this->util_->updateRecord($key, $arg, $_POST, 'teacherInfoItem', $default);
	}
		

	// Add teacher
	// basic info, identify info 
	// init password '000000'
	public function addTeacherAction() {

		// TODO:: Authority
		$infoArg = array('Tea_ID', 'Tea_name', 'Sex', 'Rank', 'Entry_time');
		$default = array('Authority' => '0');
		$this->util_->addRecord($infoArg, $_POST, 'teacherInfoItem', $default);

		$infoArg = array();
		$default['Password'] = '000000';
		$default['Tea_ID'] = $_POST['Tea_ID'];
		$this->util_->addRecord($infoArg, $_POST, 'teacherIdentityItem', $default);
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
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_POST['Account']);
		$arg = array('Password');
		$res = $identify->search($req, $arg);
		
		if($res[0]['Password'] != $_POST['OP']) {
			throw new Exception('Password wrong');
		}

		$identify->Tea_ID = $_POST['Account'];
		$arg1 = array('Password' => $_PSOT['NP']);
		$identify->update($arg1);

	}



}

?>

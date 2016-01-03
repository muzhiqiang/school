<?php

require $_SERVER['DOCUMENT_ROOT'].'/school/controller/util.php';

class studentAward {

	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	// show All Award of the student 
	public function showYearAwardAction() {

		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account']);
		$req[1] = array('key' => 'Award_time', 'Award_time' => $_POST['Award_time']);
		$arg = array('Award_ID', 'Award_time', 'Award_name', 'Award_Rank', 'Verify_statue', 'Award_intro');
		$res = $this->util_->searchRecord($req, $arg, 'studentAwardItem');

		return $res;
	}

	// show the detail intro of the award recode
	// Argument Award_ID
	//public function showDetailAwardAction() {

	//	$arg = array('Award_intro');
	//	$req = array();
	//	$req[0] = array('key' => 'Award_ID', 'Award_ID' => $_POST['Award_ID']);
	//	$res = $this->util_->searchRecord($req, $arg, 'studentAwardItem');

	//	return $res;
	//}

	// list the non-verify statue of award recode
	public function showNonVerifyAwardAction() {

		$req = array();
		$req[0] = array('key' => 'Verify_statue', 'Verify_statue' => 'Non-Verify');
		$arg = array('Award_ID', 'Award_time', 'Award_name', 'Award_Rank', 'Verify_statue');
		$res = $this->util_->search($req, $arg, 'studentAwardItem');

		return $res;
	}

	// verify the award recode
	// argument Award_ID, Verify_statue
	public function VerifyAwardAction() {

		$this->util_->requireArg('Award_ID', $_POST);
		$this->util_->requireArg('Verify_statue', $_POST);

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/studentAwardItem.php';
		$item = new studentAwardItem();
		$item->Award_ID = $_POST['Awarid_ID'];
		$arg = array('Verify_statue' => $_POST['Verify_statue']);
		$item->update($arg);
	}

	// Add an Award Recode
	public function addAwardAction() {

		$arg = array('Award_time','Award_name',  'Award_intro');
		$default = array('Stu_ID' => $_POST['Account'], 'Verify_statue' => '未通过');

		$this->util_->addRecord($arg, $_POST, 'studentAwardItem', $default);

	}


}

?>

<?php

require 'util.php';

class teacherAward {

	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	// show All Award of the teacher except detail intro;
	public function showYearAwardAction() {
		
		$req = array();
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_POST['Account']);
		$req[1] = array('key' => 'Award_time', 'Award_time' => $_POST['Award_time']);
		$arg = array('Award_ID', 'Award_time', 'Award_name', 'Award_intro', 'Verify_statue');
		$res = $this->util_->searchRecord($req, $arg, 'teacherAwardItem');

		return $res;
	}


	// list the non-verify statue of award recode
	public function showNonVerifyAwardAction() {

		$req = array();
		$req[0] = array('key' => 'Verify_statue', 'Verify_statue' => 'Non-Verify');
		$arg = array('Award_ID', 'Award_time', 'Award_name', 'Verify_statue');
		$res = $this->util_->search($req, $arg, 'teacherAwardItem');

		return $res;
	}

	// verify the award recode
	// argument Award_ID, Verify_statue
	public function VerifyAwardAction() {

		$this->util_->requireArg('Award_ID', $_POST);
		$this->util_->requireArg('Verify_statue', $_POST);

		require './model/teacherAwardItem.php';
		$item = new teacherAwardItem();
		$item->Award_ID = $_POST['Award_ID'];
		$arg = array('Verify_statue' => $_POST['Verify_statue']);
		$item->update($arg);
	}

	// Add an Award Recode
	public function addAwardAction() {

		$arg = array('Award_time', 'Award_name', 'Award_intro');
		$default = array('Tea_ID' => $_POST['Account'], 'Verify_statue' => '未审核');

		$this->util_->addRecord($arg, $_POST, 'teacherAwardItem', $default);

	}

	public function teacherAwardListAction() {
		
		$req = array();
		$req[0] = array('key' => 'Verify_statue', 'Verify_statue' => '未审核', 'table' => 'teacherAwardItem');
		$arg = array('Tea_ID', 'Tea_name', 'Award_ID', 'Award_name', 'Award_intro', 'Award_time');
		$lk = array('Tea_ID');
		require_once './model/teacherAwardItem.php';
		$item = new teacherAwardItem();
		return $item->awardLinkTeacher($req, $lk, $arg);
	}


}

?>

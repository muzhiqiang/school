<?php

require './model/studentAwardItem.php';

class studentAward {

	private $item_;

	public function __construct() {
		$this->item_ = new studentAwardItem();
	}

	// show All Award of the student except detail intro;
	public function showAllAwardAction() {

		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' = $_SESSION['Account']);
		$arg = array('Award_ID', 'Award_time', 'Award_name', 'Award_Rank', 'Verify_staue');
		$res = $this->item_->search($req, $arg);

		return res;
	}

	// show the detail intro of the award recode
	// Argument Award_ID
	public function showDetailAwardAction() {

		$this->item_->load($_POST['Award_ID'];
		$res = array();
		$res['Award_intro'] = $this->item_->Award_intro;

		return res;
	}

	// list the non-verify statue of award recode
	public function showNonVerifyAwardAction() {

		$req = array();
		$req[0] = array('key' => 'Verify_statue', 'Verify_statue' => 'Non-Verify');
		$arg = array('Award_ID', 'Award_time', 'Award_name', 'Award_Rank', 'Verify_statue');
		$res = $this->item_->search($req, $arg);

		return res;
	}

	// verify the award recode
	// argument Award_ID, Verify_statue
	public function VerifyAwardAction() {

		$req = array();
		$req[0] = array('key' = 'Award_ID', 'Award_ID' => $_POST['Award_ID']);
		$arg = array('Verify_statue' => $_POST['Verify_statue']);
		$this->item_->update($req, $arg);
	}

	// Add an Award Recode
	public function addAward() {

		$this->item_->Stu_ID = $_PSOT['Stu_ID'];
		$this->item_->Award_time = $_POST['Award_time'];
		$this->item_->Award_Rank = $_POST['Award_Rank'];
		$this->item_->Award_intro = $_POST['Award_intro'];

		$this->item_->save();
	}


}

?>

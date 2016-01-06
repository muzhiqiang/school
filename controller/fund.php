<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class fund {

	private $util_;

	public function __construct() {

		$this->util_ = new Util();
	}

	public function addFundAction() {

		$arg = array('Req_res_group_id', 'Req_time', 'Req_money', 'Req_intro');
		$default = array('Verify_statue' => '未审核');
		$this->util_->addRecord($arg, $_POST, 'fundItem', $default);
	}

	public function showNonVerifyFundAction() {
		$req = array();
		$req[0] = array('key' => 'Verify_statue', 'Verify_statue' => '未审核', 'table' => 'fundItem');
		$arg = array('Req_res_group_id', 'Req_id', 'Req_time', 'Req_money', 'Req_intro');

		return $this->util_->searchRecord($req, $arg, 'fundItem');

	}

	public function verifyFundAction() {

		$key = array('Req_id');
		$arg = array('Verify_statue');
		$default = array('Sta_ID' => $_POST['Account']);
		$this->util_->updateRecord($key, $arg, $_POST, 'fundItem', $default);
	}

}

?>

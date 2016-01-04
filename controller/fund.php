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

}

?>

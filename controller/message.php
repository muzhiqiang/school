<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class message {

	private $util_;
	
	public function __construct() {
		
		$this->util_ = new Util();
	}

	private function addMessage_() {

		$arg = array('Message_text', 'Message_title', 'message_id');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'messageContentItem', $default);

	}

	public function classMessageAction() {

		$this->util_requireArg('Account', $_POST);
		$arg = array('Class_ID');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'studentInfoItem');

		$req = array();
		$req[0] = array('key' => 'Tar_type', 'Tar_type' => 'class', 'table' => 'messageContraceItem');
		$req[1] = array('key' => 'tar_stu_id', 'tar_stu_id' => $res['data'][0]['Class_ID'], 'table' => 'messageContraceItem');

		return $this->messageDetail_($req);
		
	}

	public function sendClassMessageAction() {

		$this->addMessage_();
		$this->util_->requireArg('Account', $_POST);
		$this->util_->requireArg('Class_ID', $_POST);
		$arg = array('Class_name');
		$req = array();
		$req[0] = array('key' => 'Class_ID', 'Class_ID' => $_POST['Class_ID']);
		$res = $this->util_->searchRecord($req, $arg, 'classItem');

		$arg = array();
		$default = array('Src_type' => $res[0]['Class_name'], 'src_stu_id' => $_POST['Account'], 'Tar_type' => 'class', 'tar_stu_id' => $_POST['Class_ID']);
		$this->util_->addRecord($arg, $_POST, 'messageContraceItem', $default);

	}

	private function messageDetail_($req) {

		$arg = array('Send_time', 'Src_type', 'src_stu_id', 'Tar_type', 'tar_stu_id', 'Message_text');
		$lk = array('message_id');
		require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/messageContraceItem.php';
		$item = new messageContraceItem();
		
		$res = $item->messageLinkContent($req, $lk, $arg);
		return $res;
	}

	public function sendStuGroupMessageAction() {

		$this->addMessage_();
		$this->util_requireArg('group_id', $_POST);
		$arg = array('Group_name');
		$req = array();
		$req[0] = array('key' => 'Group_ID', 'Group_ID' => $_POST['group_id']);
		$res = $this->util_->searchRecord($req, $arg, 'studentAssocationItem');

		$arg = array();
		$default = array('Src_type' => $res['data'][0]['Group_name'], 'src_stu_id' => $_POST['group_id'], 'Tar_type' => 'assocation', 'tar_stu_id' => $_POST['group']);
		$this->util_addRecord($arg, $_POST, 'messageContraceItem', $default);

	}


		
}

?>

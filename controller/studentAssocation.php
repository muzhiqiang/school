<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class studentAssocation {

	private $util_;

	public function __construct() {

		$this->util_ = new Util();
	}

	public function showStudentAssocationAction() {

		$this->util_->requireArg('Account', $_POST);
		$arg = array('group_ID', 'group_name', 'power', 'gro_position');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' =>	$_POST['Account'], 'table' => 'studentAssocationMemberItem');
		$lk = array('group_ID');

		require_once './model/studentAssocationMemberItem.php';
		$item = new studentAssocationMemberItem();
		$res = $item->memberLinkAssocation($req, $lk, $arg);
		
		return $res;
	}

	public function enterAssocationAction() {

		$this->util_->requireArg('Account', $_POST);
		$this->util_->requireArg('group_ID', $_POST);
		$arg = array('group_ID', 'group_name', 'power', 'gro_position');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' =>	$_POST['Account'], 'table' => 'studentAssocationMemberItem');
		$req[1] = array('key' =>'group_ID', 'group_ID' => $_POST['group_ID'], 'table' => 'studentAssocationItem');
		$lk = array('group_ID');

		require_once './model/studentAssocationMemberItem.php';
		$item = new studentAssocationMemberItem();
		$res = $item->memberLinkAssocation($req, $lk, $arg);
		
		return $res;
	}

	public function AddActivityAction() {

		$arg = array('Group_ID', 'Act_name', 'Act_time', 'Act_position', 'Intro');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'ActivityItem', $default);

	}


}

?>

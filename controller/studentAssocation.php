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

	public function showMemberAction() {

		$this->util_->requireArg('Account', $_POST);
		$this->util_->requireArg('group_ID', $_POST);
		$arg = array('Stu_name', 'Stu_ID', 'power', 'gro_position');
		$req = array();
		$req[1] = array('key' =>'group_ID', 'group_ID' => $_POST['group_ID'], 'table' => 'studentAssocationMemberItem');
		$lk = array('Stu_ID');

		require_once './model/studentAssocationMemberItem.php';
		$item = new studentAssocationMemberItem();
		$res = $item->memberLinkInfo($req, $lk, $arg);
		
		return $res;

	}

	public function addMemberAction() {

	
		$arg = array('Group_ID', 'Stu_ID', 'power', 'gro_power');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'ActivityItem', $default);	
	}

	public function removeMemberAction() {

		$req = array();
		$req[0] =array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Stu_ID']);
		$req[1] = array('key' => 'Group_ID', 'Group_ID' => $_POST['Group_ID']);
		return $this->util_->removeRecord($req, 'studentAssocationMemberItem');
	}

	public function addAssocationAction() {

		$arg = array('Group_name', 'Intro');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'studentAssocationItem', $default);

		$this->util_->requireArg('Stu_ID', $_POST);
		$req = array();
		$req[0] =array('key' => 'group_name', 'group_name' => $_POST['Group_name']);
		$arg = array('group_ID');

		$tmp = $this->util_->searchRecord($req, $arg, 'studentAssocationItem');
		
		$arg =array('Stu_ID');
		$default = array('Group_ID' => $tmp[0]['group_ID'], 'Is_Leader' => '1', 'Gro_position' => '创设人', 'Power' => '4');
		$this->util_->addRecord($arg, $_POST, 'studentAssocationMemberItem', $default);

	}

	public function studentAssocationListAction() {

		$req = array();
		$arg = array('group_ID', 'group_name', 'Intro');
		return $this->util_->searchRecord($req, $arg, 'studentAssocationItem');
	}


}

?>

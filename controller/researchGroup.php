<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class researchGroup {

	private $util_;

	public function __construct() {

		$this->util_ = new Util();
	}

	// show group accoding to tea_id
	public function showProjectAction() {


		$arg = array('Res_group_id', 'Res_group_name', 'project');
		$req = array();
		$req[0] = array('key' =>'Tea_ID', 'Tea_ID' =>$_POST['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'researchGroupItem');

		return res;
	}

	// show student john research group
	public function showStudentGroupAction() {
		
		$this->util_->requireArg('Account', $_POST);
		$arg = array('Res_group_id', 'Res_group_name');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' =>$_POST['Account'], 'table' => 'researchGroupMemberItem');
		$lk = array('Res_group_id');
		require_once './model/researchGroupMemberItem.php';
		$item = new researchGroupMemberItem();
		$res = $item->memberLinkGroup($req, $lk, $arg);
		
		return $res;
	}

	public function showGroupMemberAction() {

		$arg = array('Member_ID', 'Stu_name', 'Member_type', 'Stu_ID');
		$this->util_->requireArg('Res_group_id', $_POST);
		$lk = array('Stu_ID');
		$req = array();
		$req[0] = array('key' => 'Res_group_ID', 'Res_group_ID' => $_POST['Res_group_id'], 'table' => 'researchGroupMemberItem');

		require_once './model/researchGroupMemberItem.php';
		$item = new researchGroupMemberItem();
		return $item->memberLinkStudent($req, $lk, $arg);	
	} 

	public function showTeacherGroupAction() {

		$this->util_->requireArg('Account', $_POST);
		$arg = array('Res_group_id', 'Res_group_name');
		$req = array();
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $_POST['Account']);
		$res = $this->util_->searchRecord($req, $arg, 'researchGroupItem');

		return $res;
	}

	// add group
	// in teacher port
	public function addResearchGroupAction() {

		$arg = array('Res_group_name', 'project', 'Intro');
		$default = array('Tea_ID' => $_POST['Account']);
		$this->util_->addRecord($arg, $_POST, 'researchGroupItem', $default);
	}

	// add group member by the group leader
	// in teacher port
	public function addResearchGroupMemberAction() {

		//TODO:: power
		$arg = array('Res_group_ID', 'Stu_ID', 'Member_ID', 'Tea_ID');
		$default = array('Member_type' => '组员');
		$this->util_->addRecord($arg, $_POST, 'researchGroupMemberItem', $default);
	}

	// delete group accoding to group id
	public function deleteResearchGroupAction() {

	}

	// delete group member by group leader
	public function removeResearchGroupMemberAction() {
	
		$this->util_->requireArg('Member_ID', $_POST);
		$req = array();
		$req[0] = array('key' => 'Member_ID', 'Member_ID' => $_POST['Member_ID']);
		$this->util_->removeRecord($req, 'researchGroupMemberItem');

	}

	// get the member authroity of the certain group
	public function getAuthorityAction() {

	}

	// Research Project Append
	public function addProjectAction() {

		$arg = array('Res_group_ID', 'Result_time', 'Result_Intro');
		//TODO:: verify teacher_id
		$default = array('Verify_statue' => '未审核', 'Tea_ID' => 'null');
		$this->util_->addRecord($arg, $_POST, 'researchGroupProjectItem', $default);
	}

	// show the non-verify project to the check teacher
	public function showNonVerifyProjectAction() {

		$arg = array('Result_ID', 'Res_group_name', 'Project', 'Result_time', 'Verify_statue');
		$lk = array('Res_group_ID');
		$req = array();
		$req[0] = array('key' => 'Verify_statue', 'Verify_statue' => '未审核', 'table' => 'researchGroupProjectItem');

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/researchGroupProjectItem.php';
		$item = new researchGroupProjectItem();
		$res = $item->projectLinkGroup($req, $lk, $arg);
		return $res;
	}

	// show detail information for the project accoding to Result_ID
	public function showDetailProjectAction() {

		$this->util_->requireArg('Result_ID');
		$arg = array('Result_ID', 'Res_group_name', 'Result_time', 'Result_Intro', 'Tea_ID');
		$lk = array('Res_group_ID');
		$req = array();
		$req[0] = array('key' =>'Result_ID', 'Result_ID' =>$_PSOT['Result_ID'], 'table' => 'researchGroupProjectItem');

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/researchGroupProjectItem.php';
		$item = new researchGroupProjectItem();
		$res = $item->projectLinkGroup($req, $lk, $arg);

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/teacherInfoItem.php';
		$item = new researchGroupItem();
		$arg = array('Tea_name');
		$req[0] = array('key' => 'Tea_ID', 'Tea_ID' => $res['Tea_ID']);
		unset($res['Tea_ID']);
		$tmp = $item->search($req, $arg);
		$res['Tea_name'] = $tmp['Tea_name'];

		return $res;
	}

	// verify the project
	// argument tea_id, result_id 
	public function verifyProjectAction() {

		$key = array('Result_ID');
		$arg = array('Verify_statue');
		$default = array('Tea_ID' => $_POST['Account']);
		$this->util_->updateRecord($key, $arg, $_POST, 'researchGroupProjectItem', $default);

	}

	// Append log
	public function addLogAction() {

		$arg = array('Member_ID');
		$this->util_->requireArg('Res_group_ID', $_POST);
		$req = array();
		$req[0] = array('key' => 'Res_group_ID', 'Res_group_ID' => $_POST['Res_group_ID']);
		if(isset($_POST['Stu_ID'])) {
			$req[1] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Stu_ID']);
		}
		else {
			$req[1] = array('key' => 'Tea_ID', 'Tea_ID' => $_POST['Tea_ID']);
		}
		$res = $this->util_->searchRecord($req, $arg, 'researchGroupMemberItem');
		$arg = array('Res_group_ID', 'Create_date', 'Update_data', 'Log_content');
		$default = array('Member_ID' => $res[0]['Member_ID']);
		$this->util_->addRecord($arg, $_POST, 'researchGroupLogItem', $default);

	}

	// show group all log
	// argument group_id
	public function showGroupLogAction() {

		$this->util_->requireArg('Res_group_id', $_POST);
		$arg = array('Log_ID', 'Create_date', 'Update_date', 'Stu_ID', 'Tea_ID','Log_content');
		$req = array();
		$lk = array('Member_ID');
		$req[0] = array('key' => 'Res_group_id', 'Res_group_id' => $_POST['Res_group_id'], 'table' => 'researchGroupLogItem');
		
		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/researchGroupLogItem.php';
		$item = new researchGroupLogItem();
		$res = $item->logLinkGroupMember($req, $lk, $arg);
		return $res;
	}

	// show detail info of the certain log accoding to the log_id
	public function showDetailLogAction() {


		
		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/studentInfoItem.php';
		$item = new studentInfoItem();
		$req[0] =array('key' => 'Stu_ID', 'Stu_ID' => $res['Stu_ID']);		
		$arg = array('Stu_name');
		unset($res['Stu_ID']);
		$res['Stu_name'] = $item->search(req, arg);
	}

	// update the log accoind to log_id
	// TODO:: member_ID
	public function updateLogAction() {

		$arg  = array('Update_date', 'Log_content');
		$key = array('Log_ID');
		$default = array();
		$this->util_->updateRecord($key, $arg, $_POST, 'researchGroupLogItem', $default);
	}

	public function removeLogAction() {

		$this->util_->requireArg('Log_ID', $_POST);
		$req = array();
		$req[0] = array('key' => 'Log_ID', 'Log_ID' => $_POST['Log_ID']);
		$this->util_->removeRecord($req, 'researchGroupLogItem');
	}

}


?>

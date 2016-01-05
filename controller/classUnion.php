<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class classUnion {

	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	// add class item by staff
	// Argument: class info
	public function addClassAction() {

		$arg = array('Dept', 'Year', 'Class_name', 'Sta_id', 'Major', 'Intro');
		$default = array('Grade' => '0');
		$this->util_->addRecord($arg, $_POST, 'classItem', $default);

	}

	
	// remove the class menber first
	public function removeClassAction() {

		$this->util_->requireArg('Class_ID', $_POST);
		$req = array();
		$req[0] = array('key' => 'Class_ID', 'Class_ID' => $_POST['Class_ID']);
		$this->util_->removeRecord($req, 'classItem');
	}

	public function classLeaderAction() {

		$this->util_->requireArg('Account', $_POST);
		$arg = array('Class_ID', 'Class_name');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account'], 'table' => 'studentInfoItem');
		$lk = array('Class_ID');
		require_once './model/studentInfoItem.php';
		$item = new studentInfoItem();
		$res = $item->stuLinkClass($req, $lk, $arg);
		
		$arg = array('Stu_ID', 'Stu_name', 'Position', 'Power');
		$lk = array('Stu_ID');
		$req[0] = array('key' => 'Class_ID', 'Class_ID' => $res[0]['Class_ID'], 'table' => 'classLeaderItem');
		require_once './model/classLeaderItem.php';
		$item = new classLeaderItem();
		$list = $item->leaderLinkStudent($req, $lk, $arg);
	
		$num = count($list);
		$list['Class_ID'] = $res[0]['Class_ID'];
		$list['Class_name'] = $res[0]['Class_name'];
		$list['count'] = $num;
		return $list;
	}


	// add class leader
	// argument class_id, stu_id, position
	public function addClassLeaderAction() {

		$arg = array('Class_ID', 'Stu_ID', 'Position', 'Power');
		$default = array('Is_monitor' => '0');
		$this->util_->addRecord($arg, $_POST, 'classLeaderItem', $default);

	}

	// add class monitor
	// argument class_ID, stu_id, position
	public function addClassMonitorAction() {

		$arg = array('Class_ID', 'Stu_ID');
		$default = array('Is_monitor' => '1', 'Position' => 'Monitor', 'Power' =>'');
		$this->util_->addRecord($arg, $_POST, 'classLeaderItem', $default);
	}

	public function removeClassLeaderAction() {

		$arg = array('Stu_ID', 'Class_ID');
		$this->util_->argCheck($arg, $_POST);
		$req = array();
		$req[0] =array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Stu_ID']);
		$req[1] = array('key' => 'Class_ID', 'Class_ID' => $_POST['Class_ID']);
		return $this->util_->removeRecord($req, 'classLeaderItem');
	}


	// show class list accoding to staff_id in staff port
	// argument staff_id
	public function showClassListAction() {
		
		$arg = array('Class_ID', 'Dept', 'Year', 'Class_name', 'Major', 'Sta_name');
		$req = array();
		$req[0] = array('key' => 'Grade', 'Grade' => '0', 'table' => 'classItem');
		$lk = array('Sta_ID');

		require_once './model/classItem.php';
		$item = new classItem();
		$res = $item->classLinkStaff($req, $lk, $arg);
		
		return $res;
	}





}

?>

<?php

require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';

class classUnion {

	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	// add class item by staff
	// Argument: class info
	public function addClassAction() {

		$arg = array('Dept', 'Grade', 'Year', 'Class_name', 'Major', 'Sta_ID', 'Intro');
		$default = array();
		$this->util_->addRecord($arg, $_POST, 'classItem', $default);

	}

	
	// remove the class menber first
	public function removeClassAction() {


	}

	// add class leader
	// argument class_id, stu_id, position
	public function addClassLeaderAction() {

		$arg = array('Class_ID', 'Stu_ID', 'Position');
		//TODO:: power
		$default = array('Is_monitor' => '0', 'Power' =>'');
		$this->util_->addRecord($arg, $_POST, 'classLeaderItem', $default);

	}

	// add class monitor
	// argument class_ID, stu_id, position
	public function addClassMonitorAction() {

		$arg = array('Class_ID', 'Stu_ID');
		$default = array('Is_monitor' => '1', 'Position' => 'Monitor', 'Power' =>'');
		$this->util_->addRecord($arg, $_POST, 'classLeaderItem', $default);
	}

	// show class list accoding to staff_id in staff port
	// argument staff_id
	public function showStaffClassAction() {
		
		$arg = array('Class_ID', 'Dept', 'Grade', 'Year', 'Class_name', 'Major');
		$req = array();
		$req[0] = array('key' => 'Sta_ID', 'Sta_ID' => $_SESSION['Account']);

		$res = $this->util_->searchRecord($req, $arg, 'classItem');
	}





}

?>

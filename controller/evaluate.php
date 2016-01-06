<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';
class evaluate {
	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	public function addEvaluateAction () {
		$arg = array('Eva_year_term');
		$default = array('Is_over' => false);
		$this->util_->addRecord($arg, $_POST, 'evaluateTypeItem', $default);
	}

	public function addEvaluateItemAction () {
		$res = array();
		$arg = array('Eva_course_id', 'Eva_stu_id', 'Score', 'Context');
		$time = strval(date("Y-m-d h:i:sa"));
		$default = array('time'=>$time);
		$this->util_->addRecord($arg, $_POST, 'evaluateItem', $default);

		$key = array('Course_ID');
		$arg = array('Is_Evaluate');
		$src = array('Course_ID' => $_POST['Eva_course_id'], 'Is_Evaluate' => true);
		$this->util_->updateRecord($key, $arg, $src, 'studentcourseItem', array());
	}

	public function showCourseEvaluateAction () {
		$arg = array('Eva_year_term');
		$req = array();
		$req[0] = array('key' => 'Is_over', 'Is_over' => false);
		$evaluateItem = $this->util_->searchRecord($req, $arg, 'evaluateTypeItem');
		$arg = array('Course_ID');
		$req = array();
		$req[0] = array('key' => 'Stu_ID', 'Stu_ID' => $_POST['Account']);
		$req[1] = array('key' => 'Is_Evaluate', 'Is_Evaluate' => false);
		$studentCourseItem = $this->util_->searchRecord($req, $arg, 'studentcourseItem');
		$courseArr = array();
		foreach ($studentCourseItem as $key => $item) {
			$sql = "select c.Course_ID,c.Course,t.Tea_name from course as c,teacher_basic_info as t where c.Tea_ID = t.Tea_ID and c.Course_ID = '$item[Course_ID]' and (";
			if(count($evaluateItem) == 0) {
				return;
			}			
			foreach ($evaluateItem as $key => $value) {
				if($key == 0) {
					$sql .= "Course_year_term = '$value[Eva_year_term]'";
				} else {
					$sql .= " or Course_year_term = '$value[Eva_year_term]'";
				}
			}
			$sql .= ")";
			require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
			$pod = new POD();
			$result = $pod->query($sql);
			$courseArr = array_merge($courseArr, $result);
			
		}
		return json_encode($courseArr);
		
	}
	public function setEvaluateAction () {
		$arg = array('Eva_id');
		$req = array();
		$req[0] = array('key' => 'Eva_year_term', 'Eva_year_term' => $_POST['Eva_year_term']);
		$evaluateItem = $this->util_->searchRecord($req, $arg, 'evaluateTypeItem');

		$key = array('Eva_id');
		$arg = array('Is_over');
		$src = array('Eva_id' => $evaluateItem[0]['Eva_course_id'], 'Is_over' => true);
		$this->util_->updateRecord($key, $arg, $src, 'evaluateTypeItem', array());
	}
	public function showYearAndTermAction() {
		$sql = "select Eva_year_term from evaluate order by Eva_year_term desc limit 1";
		require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
		$pod = new POD();
		$result = $pod->query($sql);
		
	}
}


?>

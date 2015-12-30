<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
class courseItem {
	public $Course;
	public $Course_ID;
	public $Tea_ID;
	public $Classroom;
	public $Teach_time;
	public $Total_time;
	public $Course_year_term;
	public $Property;
	public $Credit;
	public $Intro;
	public function __construct() {
	}
	public function load() {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$row = $db->query('select * from course where Course_ID = \''.$this->Course_ID.'\' ;');
		if(count($row) == 0) {
			$db->close();
			throw new Exception($Course_ID.'doesn\'t exist');
		}
		$this->Course = $row['course'];
		$this->Course_ID = $row['course_id'];
		$this->Tea_ID = $row['teacher_id'];
		$this->Classroom = $row['classroom'];
		$this->Teach_time = $row['teach_time'];
		$this->Total_time = $row['total_time'];
		$this->Course_year_term = $row['course_year_term'];
		$this->Property = $row['property'];
		$this->Credit = $row['credit'];
		$tish->Intro = $row['intro'];
		$db->close();
	} 
	public function save() {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('insert into course (course, teacher_id, classroon, teacher_time
		total_time, course_year_term, property, credit, intro) values(\''.$this->Course.'\', \''
		.$this->Tea_ID.'\', \''.$this->Classroom.'\', \''.$this->Teach_time.'\', \''.$this->Total_time.'
		\', \''.$this->Course_year_term.'\', \''.$this->Property.'\', \''.$this->Credit.'\', \''.$this->Intro.'
		\');');
		$db->close();
	}
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'course';
		$sql = $db->genDeleteSql($req,$table);
		$res = $db->query($sql);
		$db->close();
		return $res;
	}
	public function update($arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$req = array();
		$req[0] = array('Course_ID', $this->Course_ID);
		$table = 'course';
		$sql = $db->genUpdateSql($req, $arg, $table);
		$db->query($sql);
		$db->close();
	}
	public function search($req, $arg) {
	
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'course';
		$sql = $db->genSearchSql($req, $arg, $table);
		$res = $db->query($sql);
		return $res;
	}
	public function courseLinkTeacher($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('courseItem' =>'course', 'teacherInfoItem' => 'teacher_basic_info');
		$table = array('course', 'teacher_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
}
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school/model/pod.php';

class studentcourseItem{
	
	public $Course_ID;
	public $Stu_ID;
	public $Score;
	public $Is_Fail;
	
	public function __construct(){
		
	}
	
	public function load(){
		
	}
	
	public function save() {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('insert into stu_course (Course_ID, Stu_ID, Score, Is_Fail) values(\''.$this->Course_ID.'\', \''.$this->Stu_ID.'
		\', \''.$this->Score.'\', \''.$this->Is_Fail.'
		\');');
		$db->close();
	}
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'stu_course';
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
		$req[0] = array('Course_ID'=>$this->Course_ID,'Stu_ID'=>$this->Stu_ID);
		$table = 'stu_course';
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
		$table = 'stu_course';
		$sql = $db->genSearchSql($req, $arg, $table);
		$res = $db->query($sql);
		return $res;
	}
	public function studentcourseLinkCourse($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('studentcourseItem' =>'stu_course', 'courseItem' => 'course');
		$table = array('stu_course', 'course');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);		
		$res = $db->query($sql);
		return $res;
	}
	
	
	
	
}


?>

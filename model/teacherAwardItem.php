<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class teacherAwardItem{
	public $Award_ID;
	public $Tea_ID;
	public $Award_time;
	public $Award_intro;
	public $Award_name;
	public $Verify_statue;
	
	public function __construct(){
		
	}
	
	public function load(){
		
	}
	
	public function save(){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('insert into teacher_award (Award_ID, Tea_ID, Award_time, Award_name,Award_intro,
		Verify_statue) values(\''.
		$this->Award_ID.'\', \''.$this->Tea_ID.'\', \''.$this->Award_time.'\', \''.$this->Award_name.
		'\',  \''.$this->Award_intro.'\',\''.$this->Verify_statue.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'teacher_award';
		$sql = $db->genDeleteSql($req,$table);
		$res = $db->query($sql);
		$db->close();
		return $res;
	}
	
	public function search($req,$arg){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'teacher_award';
		$sql = $db->genSearchSql($req, $arg, $table);
		$res = $db->query($sql);
		$db->close();
		return $res;
	}
	
	public function update($arg){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'teacher_award';
		//#########################
		$req = array();
		$req[0] = array('Award_ID'=>$this->Award_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function awardLinkTeacher($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('teacherInfoItem' =>'teacher_basic_info', 
		'teacherAwardItem' => 'teacher_award');
		$table = array('teacher_award', 'teacher_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
}

?>

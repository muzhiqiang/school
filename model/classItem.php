<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class classItem{
	
	public $Class_ID;
	public $Dept;
	public $Grade;
	public $Year;
	public $Class_name;
	public $Major;
	public $Sta_id;
	public $Intro;
	
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
		$sql = 'insert into class (Dept, Grade, Year,
		Class_name,Major,Sta_id,Intro) values(\''.
		$this->Dept.'\', \''.$this->Grade.'\', \''.$this->Year.
		'\', \''.$this->Class_name.'\', \''.$this->Major.'\', \''.$this->Sta_id.'\', \''.
		$this->Intro.'\');';

		$db->query($sql);
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'class';
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
		$table = 'class';
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
		$table = 'class';
		//#########################
		$req = array();
		$req[0] = array('Class_ID'=>$this->Class_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function classLinkStaff($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('classItem' =>'class', 
		'staffInfoItem' => 'emp_basic_info');
		$table = array('class', 'emp_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
	
}

?>

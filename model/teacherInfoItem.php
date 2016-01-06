<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class teacherInfoItem{
	public $Tea_ID;
	public $Tea_name;
	public $Sex;
	public $Rank;
	public $Entry_time;
	public $Authority;
	
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
		$db->query('insert into teacher_basic_info (Tea_ID, Tea_name, Sex, Rank,
		Entry_time,Authority) values(\''.
		$this->Tea_ID.'\', \''.$this->Tea_name.'\', \''.$this->Sex.'\', \''.$this->Rank.
		'\', \''.$this->Entry_time.'\', \''.$this->Authority.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'teacher_basic_info';
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
		$table = 'teacher_basic_info';
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
		$table = 'teacher_basic_info';
		//#########################
		$req = array();
		$req[0] = array('Tea_ID'=>$this->Tea_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function stuLinkClass($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('studentIdentityItem' =>'stu_identification_info', 
		'studentInfoItem' => 'stu_basic_info');
		$table = array('stu_identification_info', 'stu_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
	
}

?>

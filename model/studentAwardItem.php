<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class studentAwardItem{
	
	public $Award_ID;
	public $Stu_ID;
	public $Award_time;
	public $Award_name;
	public $Award_intro;
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
		$db->query('insert into stu_award (Stu_ID, Award_time, Award_name,
		Award_intro,Verify_statue) values(\''.
		$this->Stu_ID.'\', \''.$this->Award_time.'\', \''.$this->Award_name.
		'\', \''.$this->Award_intro.'\', \''.$this->Verify_statue.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'stu_award';
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
		$table = 'stu_award';
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
		$table = 'stu_award';
		//#########################
		$req = array();
		$req[0] = array('Award_ID'=>$this->Award_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function awardLinkStudent($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('studentAwardItem' =>'stu_award', 
		'studentInfoItem' => 'stu_basic_info');
		$table = array('stu_award', 'stu_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
	
}
?>

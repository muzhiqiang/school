<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class staffIdentityItem {
	public $Sta_ID;
	public $Address;
	public $Birth;
	public $ID_no;
	public $Race;
	public $Polit;
	public $Native_place;
	public $Tel;
	public $Health;
	public $Experience;
	public $Intro;
	public $Password;
	
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
		$sql = 'insert into emp_identification_info (Sta_ID, Address, Birth, ID_no,
		Race,Polit,Native_place,Tel,Health,Experience,Intro,Password) values(\''.
		$this->Sta_ID.'\', \''.$this->Address.'\', \''.$this->Birth.'\', \''.$this->ID_no.
		'\', \''.$this->Race.'\', \''.$this->Polit.'\', \''.$this->Native_place.'\', \''.
		$this->Tel.'\', \''.$this->Health.'\', \''.$this->Experience.'\', \''.$this->Intro.'\', \''.$this->Password.
		'\');';
		$db->query($sql);
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'emp_identification_info';
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
		$table = 'emp_identification_info';
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
		$table = 'emp_identification_info';
		//#########################
		$req = array();
		$req[0] = array('Sta_ID'=>$this->Sta_ID);
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

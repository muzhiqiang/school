<?php
require 'pod.php';

class studentIdentityItem{
	
	public $Stu_ID;
	public $Loc;
	public $Birth;
	public $ID_no;
	public $Race;
	public $Polit;
	public $Native_place;
	public $Tel;
	public $Health;
	public $Enroll_time;
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
		$db->query('insert into stu_identification_info (Stu_ID, Loc, Birth, ID_no,
		Race,Polit,Native_place,Tel,Health,Enroll_time,Intro,Password) values(\''.
		$this->Stu_ID.'\', \''.$this->Loc.'\', \''.$this->Birth.'\', \''.$this->ID_no.
		'\', \''.$this->Race.'\', \''.$this->Polit.'\', \''.$this->Native_place.'\', \''.
		$this->Tel.'\', \''.$this->Health.'\', \''.$this->Enroll_time.'\', \''.$this->Intro.'\', \''.$this->Password.
		'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'stu_identification_info';
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
		$table = 'stu_identification_info';
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
		$table = 'stu_identification_info';
		//#########################
		$req = array();
		$req[0] = array('Stu_ID'=>$this->Stu_ID);
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

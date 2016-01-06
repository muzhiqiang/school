<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class researchGroupProjectItem{
	public $Result_ID;
	public $Res_group_ID;
	public $Result_time;
	public $Result_Intro;
	public $Verify_statue;
	public $Tea_ID;
	
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

		$sql = 'insert into res_group_achievement (Res_group_ID, Result_time, Result_Intro,
		Verify_statue) values(\''.
		$this->Res_group_ID.'\', \''.$this->Result_time.'\', \''.$this->Result_Intro.
		'\', \''.$this->Verify_statue.'\');';

		$db->query($sql);
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'res_group_achievement';
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
		$table = 'res_group_achievement';
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
		$table = 'res_group_achievement';
		//#########################
		$req = array();
		$req[0] = array('Result_ID'=>$this->Result_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function projectLinkGroup($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('researchGroupProjectItem' =>'res_group_achievement', 
		'researchGroupItem' => 'res_group');
		$table = array('res_group_achievement', 'res_group');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
	
}
?>


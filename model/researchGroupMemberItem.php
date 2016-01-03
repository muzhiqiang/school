<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class researchGroupMemberItem{
	
	public $Member_ID;
	public $Res_group_ID;
	public $Member_type;
	public $Stu_ID;
	public $Tea_ID;
	public $power;
	
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
		$db->query('insert into res_member (Member_ID, Res_group_ID, Member_type, Stu_ID,
		Tea_ID,power) values(\''.
		$this->Member_ID.'\', \''.$this->Res_group_ID.'\', \''.$this->Member_type.'\', \''.$this->Stu_ID.
		'\', \''.$this->Tea_ID.'\', \''.$this->power.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'res_member';
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
		$table = 'res_member';
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
		$table = 'res_member';
		//#########################
		$req = array();
		$req[0] = array('Member_ID'=>$this->Member_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function memberLinkGroup($req, $lk, $arg) {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('researchGroupItem' => 'res_group', 'researchGroupMemberItem' => 'res_member');
		$table = array('res_group', 'res_member');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
	
}

?>

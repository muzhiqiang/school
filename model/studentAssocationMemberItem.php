<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class studentAssocationMemberItem{
	
	public $Group_ID;
	public $Stu_ID;
	public $Is_Leader;
	public $Gro_position;
	public $Power;
	
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
		$sql = 'insert into stu_union_member (Stu_id, Group_ID, Is_Leader, Gro_position,
		Power) values(\''.$this->Stu_ID.'\', \''.$this->Group_ID.'\' ,\''.$this->Is_Leader.'\', \''.$this->Gro_position.
		'\', \''.$this->Power.'\');';
		$db->query($sql);
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'stu_union_member';
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
		$table = 'stu_union_member';
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
		$table = 'stu_union_member';
		//#########################
		$req = array();
		$req[0] = array('Group_ID'=>$this->Group_ID,'Stu_ID'=>$this->Stu_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}

	public function memberLinkAssocation($req, $lk, $arg) {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('studentAssocationMemberItem' => 'stu_union_member',
			'studentAssocationItem' => 'stu_union');
		$table = array('stu_union_member', 'stu_union');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}

	public function memberLinkInfo($req, $lk, $arg) {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('studentAssocationMemberItem' => 'stu_union_member',
			'studentInfoItem' => 'stu_basic_info');
		$table = array('stu_union_member', 'stu_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}

	
	
}

?>

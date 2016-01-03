<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class researchGroupLogItem{
	public $Log_ID;
	public $Res_group_ID;
	public $Create_date;
	public $Update_date;
	public $Member_ID;
	public $Log_content;
	
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
		$db->query('insert into res_group_log (Res_group_ID, Create_date,
		Update_date,Member_ID,Log_content) values(\''.
		$this->Res_group_ID.'\', \''.$this->Create_date.'\', \''.$this->Update_date.
		'\', \''.$this->Member_ID.'\', \''.$this->Log_content.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'res_group_log';
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
		$table = 'res_group_log';
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
		$table = 'res_group_log';
		//#########################
		$req = array();
		$req[0] = array('Log_ID'=>$this->Log_ID);
		$sql = $db->genUpdateSql($req,$arg,$table);
		$db->query($sql);
		$db->close();
	}
	
	public function logLinkGroupMember($req, $lk, $arg) {
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$map = array('researchGroupMemberItem' =>'res_member', 
		'researchGroupLogItem' => 'res_group_log');
		$table = array('res_member', 'res_group_log');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);

		$res = $db->query($sql);
		return $res;
	}
	
}

?>

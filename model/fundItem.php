<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
class fundItem{
	public $Req_id;
	public $Req_type;
	public $Req_res_group_id;
	public $Req_time;
	public $Req_money;
	public $Req_intro;
	public $Verify_statue;
	public $Verify_time;
	public $Sta_ID;
	
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
		$db->query('insert into financial_report (Req_type, Req_res_group_id, Req_time,
		Req_money,Req_intro,Verify_statue,Verify_time) values(\''.
		$this->Req_type.'\', \''.$this->Req_res_group_id.'\', \''.$this->Req_time.
		'\', \''.$this->Req_money.'\', \''.$this->Req_intro.'\', \''.$this->Verify_statue.'\', \''.
		$this->Verify_time.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'financial_report';
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
		$table = 'financial_report';
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
		$table = 'financial_report';
		//#########################
		$req = array();
		$req[0] = array('Req_id'=>$this->Req_id);
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

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
class financialAccountItem{
	public $Money_id;
	public $Money_time;
	public $Get_in_from;
	public $Get_out_to;
	public $In_out;
	public $Cur_money;
	public $Intro;
	public $Sta_id;
	public $Req_id;
	
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
		$db->query('insert into financial_account (Money_time, Get_in_from, Get_out_to,
		In_out,Cur_money,Intro,Sta_id,Req_id) values(\''.
		$this->Money_time.'\', \''.$this->Get_in_from.'\', \''.$this->Get_out_to.
		'\', \''.$this->In_out.'\', \''.$this->Cur_money.'\', \''.$this->Intro.'\', \''.
		$this->Sta_id.'\', \''.$this->Req_id.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'financial_account';
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
		$table = 'financial_account';
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
		$table = 'financial_account';
		//#########################
		$req = array();
		$req[0] = array('Money_id'=>$this->Money_id);
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

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';

class studentAcademicItem{
	
	public $Stu_ID;
	public $Course_year_term;
	public $Avg_Score;
	public $Gain_Credit;
	public $Gpd;
	public $Class_Rank;
	public $Grade_Rank;
	public $Fail_Num;
	
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
		$db->query('insert into stu_evaluate (Stu_ID, Course_year_term, Avg_Score, 
		Gain_Credit,Gpd,Class_Rank,Grade_Rank,Fail_Num) values(\''.
		$this->Stu_ID.'\', \''.$this->Course_year_term.'\', \''.$this->Avg_Score.'\', \''.
		$this->Gain_Credit.'\', \''.$this->Gpd.'\', \''.$this->Class_Rank.'\', \''.
		$this->Grade_Rank.'\', \''.$this->Fail_Num.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'stu_evaluate';
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
		$table = 'stu_evaluate';
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
		$table = 'stu_evaluate';
		//#########################
		$req = array();
		$req[0] = array('Stu_ID'=>$this->Stu_ID,'Course_year_term'=>$this->Course_year_term);
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
		//##############################################
		$map = array('studentIdentityItem' =>'stu_identification_info', 
		'studentInfoItem' => 'stu_basic_info');
		$table = array('stu_evaluate', 'stu_basic_info');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		$res = $db->query($sql);
		return $res;
	}
	
}

?>

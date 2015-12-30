
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
class messageContraceItem{
	public $Trans_id;
	public $message_id;
	public $Src_type;
	public $src_stu_id;
	public $Tar_type;
	public $tar_stu_id;
	public $Send_time;
	
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
		$db->query('insert into message_interconnect (message_id, Src_type, src_stu_id,
		Tar_type,tar_stu_id,Send_time) values(\''.
		$this->message_id.'\', \''.$this->Src_type.'\', \''.$this->src_stu_id.
		'\', \''.$this->Tar_type.'\', \''.$this->tar_stu_id.'\', \''.$this->Send_time.'\');');
		$db->close();
	}
	
	public function delete($req){
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$table = 'message_interconnect';
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
		$table = 'message_interconnect';
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
		$table = 'message_interconnect';
		//#########################
		$req = array();
		$req[0] = array('Trans_id'=>$this->Trans_id);
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

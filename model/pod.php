<?php 

class POD {

	private $con;

	public function __construct() {
		
	}

	public function connect() {

		$this->con = mysql_connect('localhost', 'root', '283447');
		if(!$this->con) {
			return false;
		}
		mysql_select_db('sms');
		mysql_query("set names 'utf8'");
		return true;;
	}

	public function query($sql) {

		$request =  mysql_query($sql);
		if (!$request) {
			throw new Exception('Invalid query: ' . mysql_error());
		}

		$res = array();
		$num = 0;
		while($row = mysql_fetch_array($request, MYSQL_ASSOC)) {
			foreach($row as $key => $value) {
				$res[$num][$key] = $value;
			}
			$num++;
		}
		return $res;
	}

	public function close() {

		mysql_close($this->con);
	}

	// update only for the primary key
	public function genUpdateSql($req, $arg, $table) {

		$sql = 'update '.$table.' set ';
		$num = count($arg);
		$i =0 ;
		foreach($arg as $key => $value) {
			$sql = $sql.$key.' = '.$value.' ';
			$i++;
			if($i != $num) {
				$sql = $sql.',';
			}
		}
		$sql = $sql.'where ';
		$i = 0;
		$num = count($req);
		foreach($req as $key => $value) {
			$sql = $sql.$key.' = \''.$value.'\' ';
			$i++;
			if($i != $num) {
				$sql = $sql.' and ';
			}
			else {	
				$sql = $sql.';';
			}
		}
		return $sql;

	}

	public function genSearchSql($req, $arg, $table) {

		$sql = 'select ';
		$num = count($arg);
		for($i=0; $i<$num; $i++) {
			$sql = $sql.$arg[$i];
			if($i != $num -1) {
				$sql = $sql.' ,';
			}
		}
		$sql = $sql.' from '.$table.' where ';
		$num = count($req);
		for($i =0; $i<$num; $i++) {
			$tmp = $req[$i]['key'];
			$sql = $sql.$tmp.' = \''.$req[$i][$tmp];
			if($i == $num -1) {
				$sql = $sql.'\' ; ';
			}
			else {
				$sql = $sql.'\' and ';
			}
		}
		return $sql;
	}

	public function genLinkSql($req, $lk, $arg, $table, $map) {
		
		$sql = 'select ';
		$num = count($arg);
		for($i=0; $i<$num; $i++) {
			$sql = $sql.$arg[$i];
			if($i != $num -1) {
				$sql = $sql.' ,';
			}
		}
		$sql = $sql.' from ';
		$num = count($table);
		for($i=0; $i<$num; $i++) {
			$sql = $sql.$table[$i];
			if($i != $num -1) {
				$sql = $sql.' ,';
			}
		}
		$sql = $sql.' where ';
		$lag = array();
		$i =0;
		foreach($req as $tmp) {
			$key = $tmp['key'];
			$lag[$i] = $map[$tmp['table']].'.'.$key.' = \''.$tmp[$key].'\'';
			$i++;
		}
		foreach($lk as $tmp) {
			$lag[$i] = $table[0].'.'.$tmp.' = '.$table[1].'.'.$tmp;
			$i++;
		}
		$num = count($lag);
		for($i =0; $i<$num; $i++) {
			$sql = $sql.$lag[$i];
			if($i == $num -1) {
				$sql = $sql.' ; ';
			}
			else {
				$sql = $sql.' and ';
			}
		}
		return $sql;
	}
		 

}

?>

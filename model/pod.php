<?php 

class POD {

	private $con;

	public function __construct() {
		
	}
	
	// connect to mysql
	public function connect() {

		$this->con = mysql_connect('localhost', 'root', '');
		if(!$this->con) {
			return false;
		}
		mysql_select_db('sms');
		mysql_query("set names 'utf8'");
		return true;;
	}

	// query the sql, return the array[num][kv]
	// if error, throw the mysql_error
	public function query($sql) {

		$request =  mysql_query($sql);
		if (!$request) {
			throw new Exception('Invalid query: ' . mysql_error());
		}

		
		if(substr($sql, 0, 1) == 'i' || substr($sql, 0, 1) == 'u') {
			return 'true';
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

	// close mysql connection
	public function close() {

		mysql_close($this->con);
	}

	// generate update sql
	// req is primary key  array[num][kv]
	// arg is the update type, array[kv]
	// table is the target table, string
	// update only for the primary key
	public function genUpdateSql($req, $arg, $table) {

		$sql = 'update '.$table.' set ';
		$num = count($arg);
		$i =0 ;
		foreach($arg as $key => $value) {
			$sql = $sql.$key.' = \''.$value.'\' ';
			$i++;
			if($i != $num) {
				$sql = $sql.',';
			}
		}
		$sql = $sql.'where ';
		$i = 0;
		$num = count($req);
		foreach($req[$i] as $key => $value) {
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

	// generate search sql of one table operator
	// req is the qualification array[num][kv]
	// arg is the return type array[num]
	// table is the target tabel string
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

	// generate delete sql
	// req is the qulification array[num][kv]
	// table is the table string
	public function genDeleteSql($req,$table){
		$sql = 'delete ';
		$num = count($req);
		$sql = $sql.'* from '.$table.' where ';
		for($i = 0 ; $i<num ; $i++){
			$tmp = $req[$i]['Key'];
			$sql = $sql.$tmp.'=\''.$req[$i][$tmp];
			if($i == $num - 1){
				$sql = $sql.'\';';
			}
			else {
				$sql = $sql.'\' and ';
			}
		}
		return $sql;
	}

	// generate double table search sql
	// req is the qualification array[num][kv]
	// arg is the return type array[num], not for the type that exist in both table
	// lk is the connect qualification array[num]
	// table is the table list array[num]
	// map is the model table associate with the db table array[kv]
	public function genLinkSql($req, $lk, $arg, $table, $map) {
		
		$sql = 'select ';
		$num = count($arg);
		for($i=0; $i<$num; $i++) {
			if(in_array($arg[$i], $lk)) {
				$sql = $sql.$table[0].'.'.$arg[$i];
			}
			else
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

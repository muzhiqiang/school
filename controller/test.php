<?php

class test {

	public function test1Action() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$req = array();
		$req[0] = array('key' => 'account','account' => '111');
		$arg = array('name', 'account');
		$table = 'Person';
		$sql = $db->genSearchSql($req, $arg, $table);
		$res = $db->query($sql);

		throw new Exception($res[0]['name']);
		return $res;
	}

	public function test2Action() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$req = array();
		$lk = array('account');
		$req[0] = array('key' => 'account','account' => '111', 'table'=>'p');
		$arg = array('name', 'password');
		$table = array('Person', 'Account');
		$map = array('p'=>'Person', 'a'=>'Account');
		$sql = $db->genLinkSql($req, $lk, $arg, $table, $map);
		//echo $sql;
		//exit;
		$res = $db->query($sql);

		return $res;
	}

	public function testAction() {

		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/courseItem.php';
		$item = new courseItem();

		$arg = array('Course', 'Course_ID');
		require $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';
		$Util = new util();

		echo property_exists($item, 'Course_ID');
		if(!property_exists($item, 'haha')) {
			echo 'false';
		//	exit();
		}
		$Util->argCheck($arg, $_GET);
		foreach($arg as $tmp) {
			$item->$tmp = $_GET[$tmp];
		}

		foreach($arg as $tmp) {
			echo $item->$tmp;
		}
	}

}

?>

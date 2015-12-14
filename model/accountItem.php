<?php

include 'pod.php';

class accountItem {

	public $account;
	public $password;
	public $type;

	public function __construct() {

	}

	public function load($key) {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}

		$res = $db->query('select * from Account where account = \''.$key.'\' ;');
		if(mysql_num_rows($res) == 0) {
			$db->close();
			throw new Exception('account doesn\'t exist');
		}

		$row = mysql_fetch_array($res);
		$this->password = $row['password'];
		$this->type = $row['type'];
		$this->account = $key;		
		$db->close();
	} 	

	public function update() {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('update Account set password = \''.$this->password.'\' where account = \''.$this->account.'\';');
		$db->close();
	}

	public function save() {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('insert into Account (account, password, type) values(\''.$this->account.'\', \''.$this->password.'\', \''.$this->type.'\';');
		$db->close();
	}

	public function delete() {

		$db = new POD();
		$p = $db->connect();
		if($p == false) {
			throw new Exception('Database connect failed');
		}
		$db->query('delete from Account where account = \''.$this->account.'\';');
		$db->close();
	}

	public function search() {

	}
		
	

}

?>

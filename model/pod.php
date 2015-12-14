<?php 

class POD {

	private $con;

	public function __construct() {
		
	}

	public function connect() {

		$this->con = mysql_connect('localhost', 'root', '23333');
		if(!$this->con) {
			return false;
		}
		mysql_select_db('sms');
		return true;;
	}

	public function query($sql) {

		return mysql_query($sql);
	}

	public function close() {

		mysql_close($this->con);
	}

}

?>

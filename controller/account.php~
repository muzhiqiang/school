<?php

class account {

	public function __construct() {

	}

	// login function, accdoing to the account type, set the session
	// Aegument ID, Password, Type
	public function loginAction() {

		if(!isset($_POST('ID'))) {
			throw new Exception('ID is not set');
		}
		if(!isset($_POST('Password'))) {
			throw new Exception('Password is not set');
		}
		if(!isset($_POST('Type'))) {
			throw new Exception('Type is not set');
		}

		$info;
		$id;
		if($_POST['Type'] == 'student') {
			require './model/studentIdentify.php';
			$info = new stuentIdentify();
			$id = Stu_ID;
		}
		else if($_PSOT['Type'] == 'teacher') {
			require './model/teacherIdentify.php';
			$info = new teacherIdentify();
			$id = Tea_ID;
		}
		else if($_PSOT['Type'] == 'staff') {
			require './model/staffIdentify.php';
			$info = new staffIdentify();
			$id = Sta_ID;
		}
		else {
			throw new Exception('Type us invalid');
		}
		$req = array();
		$req[0] = array('key' => $id, $id =>$_POST['ID']);
		$arg = array('Passwrod');
		$res = $info->search($req, $arg);

		if(count($res) == 0) {
			throw new Exception('Account does not exist');
		}
		else {
			if(res[0]['Password'] != $_POST['Password']) {
				throw new Exception('Password is wrong');
			}
		}
		$_SESSION['Account'] = $id;
		$_SESSION['Type'] = $_POST['Type'];
		return true;

	}

	// logout remove the session
	public function logoutAction() {

		unset($_SESSION['Account']);
		unset($_SESSION['Type']);
	}

}

?>

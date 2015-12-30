<?php

class account {

	public function __construct() {

	}

	// login function, accdoing to the account type, set the session
	// Aegument ID, Password, Type
	public function loginAction() {

		if(!isset($_POST['ID'])) {
			throw new Exception('ID is not set');
		}
		if(!isset($_POST['Password'])) {
			throw new Exception('Password is not set');
		}
		if(!isset($_POST['Type'])) {
			throw new Exception('Type is not set');
		}

		$info;
		$id;
		if($_POST['Type'] == 'student') {
			require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/studentIdentityItem.php';
			$info = new studentIdentityItem();
			$id = 'Stu_ID';
		}
		else if($_PSOT['Type'] == 'teacher') {
			require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/teacherIdentityItem.php';
			$info = new teacherIdentityItem();
			$id = 'Tea_ID';
		}
		else if($_PSOT['Type'] == 'staff') {
			require $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/staffIdentityItem.php';
			$info = new staffIdentityItem();
			$id = 'Sta_ID';
		}
		else {
			throw new Exception('Type us invalid');
		}
		$req = array();
		$req[0] = array('key' => $id, $id =>$_POST['ID']);
		$arg = array('Password');
		$res = $info->search($req, $arg);

		if(count($res) == 0) {
			throw new Exception('Account does not exist');
		}
		else {
			if($res[0]['Password'] != $_POST['Password']) {
				throw new Exception('Password is wrong');
			}
		}

		$_SESSION['Account'] = $_POST['ID'];
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

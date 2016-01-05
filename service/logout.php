<?php
	session_start();
	if($_SESSION['Type'] == 'staff') {
		unset($_SESSION['Position']);
	}	
	unset($_SESSION['Account']);
	unset($_SESSION['Type']);

	header('location:/school/login.php');
?>

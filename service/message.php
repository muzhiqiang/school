<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	
	$api = new APICaller();

	$type = $_SESSION['Type'];
	if($type == 'student') {

		$message = $api->excute('message', 'studentmessage');

		if($message['success'] == false) {
			$_SESSION['errno'] = $message['data'];
			header('location:/school/404.php');
		}
	}


?>

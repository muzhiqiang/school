<?php 

	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$api = new APICaller();
	$result = $api->excute('account', 'login');
	

	if($result['success'] == true) {
		switch($_SESSION['Type']) {
			case 'student':				
				header('location:/school/student/stu_info.php');
				break;
			case 'teacher':
				break;
			case 'staff':
				break;	
		}
		
	}
	else {
		$_SESSION['errno'] = $result['data'];
		header('location: /school/404.php');

	}
?>

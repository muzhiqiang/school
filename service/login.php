<?php 

	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';


	$api = new APICaller();
	$result = $api->excute('account', 'login');
	
	if($result['success'] == true) {
		
		$_SESSION['Account'] = $_POST['ID'];
		$_SESSION['Type'] = $_POST['Type'];

		switch($_SESSION['Type']) {
			case 'student':				
				header('location:/school/student/stu_info.php');
				break;
			case 'teacher':
				header('location:/school/teacher/tea_info.php');
				break;
			case 'staff':
				$tmp = $api->excute('staff', 'position');
				$_SESSION['Position'] = $tmp['data'][0]['Position'];
				header('location:/school/employee/emp_info.php');
				break;	
		}
		
	}
	else {
		$_SESSION['errno'] = $result['data'];
		header('location: /school/404.php');

	}
?>

<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	$api = new APICaller();
	if(isset($_GET['id'])) {
	
		$_POST['Award_ID'] = $_GET['id'];
		$_POST['Verify_statue'] = $_GET['Verify_statue'];
		$tmp = $api->excute($_GET['controller'], $_GET['method']);

		if($tmp['success'] != 1) {
			$_SESSION['errno'] =  $tmp['data'];
			header('location:/school/404.php');
		}

	}

	$tea = $api->excute('teacherAward', 'teacherAwardList');

	if($tea['success'] != 1) {
		$_SESSION['errno'] =  $tea['data'];
		header('location:/school/404.php');
	}

	$stu = $api->excute('studentAward', 'studentAwardList');

	if($stu['success'] != 1) {
		$_SESSION['errno'] =  $stu['data'];
		header('location:/school/404.php');
	}


?>

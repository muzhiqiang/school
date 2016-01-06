<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	
	$api = new APICaller();
	$tea = array();
	$com = array();
	$pro = array();
	
	$result = $api->excute('teacher', 'getAuthority');
	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
		header('location:/school/404.php');
	}

	$power = $result['data'][0]['Authority'];
	if(isset($_GET['controller'])) {
		$result = $api->excute($_GET['controller'], $_GET['method']);
		if($result['success'] != 1) {
			$_SESSION['errno'] = $result['data'];
			header('location:/school/404.php');
		}
	}
	if(isset($_GET['page'])) {
		$i = $_GET['page'];
		if($i == '1') {
			$tmp = $api->excute('teacher', 'committeeList');
			if($tmp['success'] != 1) {
				$_SESSION['errno'] = $tmp['data'];
				header('location:/school/404.php');
			}
			$com = $tmp['data'];

		}
		if($i == '2') {
			$tmp = $api->excute('teacher', 'teacherList');
			if($tmp['success'] != 1) {
				$_SESSION['errno'] = $tmp['data'];
				header('location:/school/404.php');
			}
			$tea = $tmp['data'];
		}
		if($i == '3') {
			$tmp = $api->excute('researchGroup', 'showNonVerifyProject');
			if($tmp['success'] != 1) {
				$_SESSION['errno'] = $tmp['data'];
				header('location:/school/404.php');
			}
			$pro = $tmp['data'];
		}
	}

?>

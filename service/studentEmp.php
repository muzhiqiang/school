<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	$api = new APICaller();
	$list = array('data' => array());

	if(isset($_GET['controller'])) {

		if(isset($_GET['Class_ID'])) {
			$_POST['Class_ID'] = $_GET['Class_ID'];
		}
		$tmp = $api->excute($_GET['controller'], $_GET['method']);

		if($tmp['success'] != 1) {
			$_SESSION['errno'] =  $tmp['data'];
			header('location:/school/404.php');
		}
		$list = $tmp;
	}

	$result = $api->excute('classUnion', 'showStaffClassList');

	if($result['success'] != 1) {
		$_SESSION['errno'] =  $result['data'];
		header('location:/school/404.php');
	}


?>

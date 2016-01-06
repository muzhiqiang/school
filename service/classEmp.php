<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	$api = new APICaller();

	if(isset($_GET['controller'])) {

		$tmp = $api->excute($_GET['controller'], $_GET['method']);

		if($tmp['success'] != 1) {
			$_SESSION['errno'] =  $tmp['data'];
			header('location:/school/404.php');
		}

	}

	$result = $api->excute('classUnion', 'showClassList');

	if($result['success'] != 1) {
		$_SESSION['errno'] =  $result['data'];
		header('location:/school/404.php');
	}


?>

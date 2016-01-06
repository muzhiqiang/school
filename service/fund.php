<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	$api = new APICaller();
	if(isset($_GET['id'])) {

		$_POST['Req_id'] = $_GET['id'];
		$_POST['Verify_statue'] = $_GET['Verify_statue'];
		$tmp = $api->excute($_GET['controller'], $_GET['method']);
		if($tmp['success'] != 1) {
			$_SESSION['errno'] =  $tmp['data'];
			header('location:/school/404.php');
		}

	}

	$result = $api->excute('fund', 'showNonVerifyFund');

	if($result['success'] != 1) {
		$_SESSION['errno'] =  $result['data'];
		header('location:/school/404.php');
	}


//exit();
?>

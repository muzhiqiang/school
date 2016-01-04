<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	session_start();
	$api = new APICaller();

	$controller = $_GET['type'].'Award';
	$_POST['Award_time'] = $_POST['applyYear'].$_POST['applyTerm'];

	$result = $api->excute($controller, 'addAward');

	if($result['success'] != 1) {
		echo $result['data'];
		exit();
	}

	header('location:/school/student/stu_pride.php');

?>

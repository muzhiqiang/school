<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	session_start();
	$api = new APICaller();


	$_POST['Award_time'] = $_POST['applyYear'].$_POST['applyTerm'];

	$result = $api->excute('studentAward', 'addAward');

	if($result['success'] != 1) {
		echo $result['data'];
		exit();
	}

	header('location:/school/student/stu_pride.php');

?>

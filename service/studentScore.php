<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	session_start();
	$api = new APICaller();
	$_POST['Course_year_term'] = $_GET['Course_year_term'];
	$result = $api->excute('score', 'showScore');

	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
	 	header('location:/school/404.php');
	}	
	echo json_encode($result);

?>

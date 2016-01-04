<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	
	$api = new APICaller();
	$tea = array();
	$result = $api->excute('committee', 'showTeacherYearCourse');
	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
		header('location:/school/404.php');
	}
	$tea = $result['data'];

?>

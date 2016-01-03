<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$api = new APICaller();
	$result = $api->excute('evaluate', 'showCourseEvaluate');
	
	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
	 	header('location:/school/404.php');
	}	

?>

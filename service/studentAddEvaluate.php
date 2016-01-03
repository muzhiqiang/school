<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	session_start();
	$api = new APICaller();
	$result;
	$count = $_POST['count'];
	$_POST['Eva_stu_id'] = $_SESSION['Account'];
	for ($i=0; $i < $count; $i++) { 
		$_POST['Eva_course_id'] = $_POST['Course_ID'.$i];
		$_POST['Score'] = $_POST['Score'.$i];
		$_POST['Context'] = $_POST['Context'.$i];
		$result = $api->excute('evaluate', 'addEvaluateItem');
		if($result['success'] != 1) {
			$_SESSION['errno'] = $result['data'];
		 	header('location:/school/404.php');
		}
	}
	header('location:/school/student/stu_evaluate.php');

?>

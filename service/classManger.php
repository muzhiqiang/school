<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$api = new APICaller();
	$result = $api->excute('classUnion', 'classLeader');
	
	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
	 	header('location:/school/404.php');
	}

	$class_name = $result['data']['Class_name'];
	$class_id = $result['data']['Class_ID'];
	$num = $result['data']['count'];
	$position = '无';
	$power = 0;
	for($i =0; $i< $num; $i++) {
		if($result['data'][$i]['Stu_ID'] == $_SESSION['Account']) {
			$position = $result['data'][$i]['Position'];
			$power = $result['data'][$i]['Power'];
		}
	}
	$power = 2;

?>

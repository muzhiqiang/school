<?php

	$message = array();
	$log = array();
	$mylog = array();
	$member = array();
	if(isset($_GET['controller'])) {
		require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
		$api = new APICaller();

		$_POST['Res_group_id'] = $_GET['Res_group_id'];	
		$message = array();
		$tmp = $api->excute($_GET['controller'], $_GET['method']);
		if($tmp['success'] == false) {
			$_SESSION['errno'] = $tmp['data'];
			header('location:/school/404.php');
		}

		$type = $_GET['type'];
		$id;
		if($type == 'teacher') {
			$id = 'Tea_ID';
			//TODO: group_member;
		}
		else {
			$id = 'Stu_ID';
		}
		foreach($tmp['data'] as $t) {

			if($t['Stu_ID'] == $_SESSION['Account']) {
				array_push($mylog, $t);
			}
		}
		$log = $tmp['data'];


	}
	
?>

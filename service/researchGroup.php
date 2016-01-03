<?php

	$message = array();
	$log = array();
	$mylog = array();
	if(isset($_GET['controller'])) {
		require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
		$api = new APICaller();

		$_POST['Res_group_id'] = $_GET['Res_group_id'];	
		$message = array();
		$log = $api->excute($_GET['controller'], $_GET['method']);
		if($log['success'] == false) {
			$_SESSION['errno'] = $log['data'];
			header('location:/school/404.php');
		}


		foreach($log['data'] as $tmp) {

			if($tmp['Stu_ID'] == $_SESSION['Account']) {
				array_push($mylog, $tmp);
			}
		}


	}
	
?>

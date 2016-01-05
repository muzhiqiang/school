<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php');

	$api = new APICaller();
	$res = array('data' => '');
	$list = array('data' =>array());
	if(isset($_GET['group_ID'])) {

		$_POST['Account'] = $_SESSION['Account'];
		$_POST['group_ID'] = $_GET['group_ID'];
		$aso = $api->excute($_GET['controller'], $_GET['method']);

		if($aso['success'] == false) {
			$_SESSION['errno'] = $res['data'];
			header('location:/school/404.php');
		}
		$list = $api->excute('studentAssocation', 'showMember');
		if($list['success'] == false) {
			$_SESSION['errno'] = $list['data'];
			header('location:/school/404.php');
		}

	}

	$_POST['Account'] = $_SESSION['Account'];
	$res = $api->excute('studentAssocation', 'showStudentAssocation');

	if($res['success'] == false) {
		$_SESSION['errno'] = $res['data'];
		header('location:/school/404.php');
	}



?>

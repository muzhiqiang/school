<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php');

	$api = new APICaller();

	if(isset($_GET['controller'])) {

		if(isset($_GET['id'])) {
			$_POST['Sta_ID'] = $_GET['id'];
		}
		else {
			$_POST['Account'] = $_SESSION['Account'];
		}		
		$aso = $api->excute($_GET['controller'], $_GET['method']);

		if($aso['success'] == false) {
			$_SESSION['errno'] = $aso['data'];
			header('location:/school/404.php');
		}
	}

	$_POST['Account'] = $_SESSION['Account'];
	$result = $api->excute('staff', 'staffList');

	if($result['success'] == false) {
		$_SESSION['errno'] = $result['data'];
		header('location:/school/404.php');
	}


?>

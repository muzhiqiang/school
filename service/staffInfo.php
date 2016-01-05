<?php 

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';


	$api = new APICaller();
	
	if(isset($_GET['controller'])) {
		$_POST['Account'] = $_SESSION['Account'];
		$result = $api->excute($_GET['controller'], $_GET['method']);
		if($result['success'] != 1) {
			$_SESSION['errno'] = $result['data'];
	 		header('location:/school/404.php');
		}
		
	}
	$result = $api->excute('staff', 'showInfo');
 

	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
	 	header('location:/school/404.php');
	}	


?>

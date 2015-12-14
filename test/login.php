<?php

include_once '../apiCaller.php';
$apiCaller = new apiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://localhost/api/route.php');

try {
	header('Content-Type:application/json; charset=utf-8');
	$result = $apiCaller->sendRequest(array(
		'controller' => 'account',
		'action' => 'login',
		'account' =>$_GET['account'],
		'password' =>$_GET['password'],
		'type' =>$_GET['type']
		//'uri' => $_GET['uri'],
		//'range' => $_GET['range']
	));


	echo json_encode($result, JSON_UNESCAPED_SLASHES);
	exit();
}
catch (Exception $e) {

	echo json_encode($e->getMessage(), JSON_UNESCAPED_SLASHES);
	exit();
}

?>

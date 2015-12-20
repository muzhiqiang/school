<?php
// Function: access api server authorization, decrypt request params and transmit request
// Return: return json array
//   { 'success' : true or false,
//		'data' : data or error message
//  }

		
//TODO:: Request Identification
//$application = array(
//	'APP001' => '28e336ac6c9423d946ba02d19c6a2632',
//);// demo app id

try {
	
	$controller = $_GET['controller'];
	$method = $_GET['method'].'Action';

	$file = './controller/'.$controller.'.php';
	if(file_exists($file)) {
		include_once $file;
	}
	else {
		throw new Exception('controller is invalid');
	}

	if(method_exists($controller, $method) == false) {
		throw new Exception('action is invalid');
	}

	session_start();  
	$controller = new $controller();
	$result = array();
	$result['data'] = $controller->$method();
	$result['success'] = true;
	
	echo json_encode($result, JSON_UNESCAPED_SLASHES);
	exit();

}
catch (Exception $e) {

	$result = array();
	$result['success'] = false;
	$result['data'] = $e->getMessage();
	echo json_encode($result, JSON_UNESCAPED_SLASHES);
	exit();
}

?>

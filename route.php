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

		header('Content-Type:application/json; charset=utf-8');
			
		 if(!isset($_POST['controller'])) {
		 	throw new Exception('controller is not set');
		 }
		 if(!isset($_POST['method'])) {
		 	throw new Exception('method is not set');
		 }
		

		$controller = $_POST['controller'];
		$method = $_POST['method'].'Action';

		$file = $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/'.$controller.'.php';
		if(file_exists($file)) {
			include_once $file;
		}
		else {
			throw new Exception('controller is invalid'.$file);
		}

		if(method_exists($controller, $method) == false) {
			throw new Exception('action is invalid'.$method);
		}

		$controller = new $controller();
		$result = array();
		$result['data'] = $controller->$method();
		$result['success'] = true;
		echo json_encode($result, JSON_UNESCAPED_SLASHES);

	}
	catch (Exception $e) {

		$result = array();
		$result['success'] = false;
		$result['data'] = $e->getMessage();
		echo json_encode($result, JSON_UNESCAPED_SLASHES);
	}

?>

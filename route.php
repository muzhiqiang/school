<?php
// Function: access api server authorization, decrypt request params and transmit request
// Return: return json array
//   { 'success' : true or false,
//		'data' : data or error message
//  }

		
//TODO:: Request Identification
$application = array(
	'APP001' => '28e336ac6c9423d946ba02d19c6a2632',
);// demo app id

try {
	$enc_request = $_POST['enc_request'];
	$app_id = $_POST['app_id'];

	//decrypte the request
	$params = json_decode(trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $application[$app_id], base64_decode($enc_request), MCRYPT_MODE_ECB)));

	// Request: decrypt params successfully, params include the arguments of controller and action
	// otherwise: throw Exception('Request is not valid'); 
	if( $params == false || isset($params->controller) == false || isset($params->action) == false) {
		throw new Exception('Request is not valid');
	}

	$params = (array) $params;
	$controller = strtolower($params['controller']);
	$action = strtolower($params['action']).'Action';

	$file = './controller/'.$controller.'.php';
	if(file_exists($file)) {
		include_once $file;
	}
	else {
		throw new Exception('controller is invalid');
	}

	if(method_exists($controller, $action) == false) {
		throw new Exception('action is invalid');
	}

	$controller = new $controller($params);
	$result = array();
	$result['data'] = $controller->$action();
	$result['success'] = true;
	
	echo json_encode($result, JSON_UNESCAPED_SLASHES);
	exit();

}
catch (Exception $e) {

	$result = array();
	$result['success'] = false;
	$result['errno'] = $e->getMessage();
	echo json_encode($result, JSON_UNESCAPED_SLASHES);
	exit();
}

?>

<?php

class APICaller {


	public function excute($controller, $method) {
		$params = array();
		$params['controller'] = $controller;
		$params['method'] = $method;
		foreach ($_POST as $key => $value) {
			$params[$key] = $value;
		}
		if(isset($_SESSION['Account'])) {
			$params['Account'] = $_SESSION['Account'];
		}

		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, 'localhost/school/route.php');  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

		$data = curl_exec($ch);

		curl_close($ch);

		return (array)json_decode($data, true);
	}
}

?>

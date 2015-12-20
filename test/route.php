<?php
		
class Route {

	private $controller_;
	private $method_;

	public function __construct($controller, $method) {

		$this->controller_ = $controller;
		$this->method_ = $method.'Action';

		$file = '../controller/'.$this->controller_.'.php';
		if(file_exists($file)) {
			include_once $file;
		}
		else {
			throw new Exception('controller is invalid');
		}

		if(method_exists($this->controller_, $this->method_) == false) {
			throw new Exception('action is invalid');
		}

	}

	public function run() {

		$controller = new $this->controller_();
		$result = array();
		$method = $this->method_;
		$result['data'] = $controller->$method();
		$result['success'] = true;
		
		return $result;
	}

}


?>

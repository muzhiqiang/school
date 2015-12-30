<?php

class Util {
	
	public function __construct() {

	}
	
	// check the require argument in the list from arg
	// if not be set , throw Exception
	// list is the argument list to be checked
	// arg is the check source array
	public function argCheck($list, $arg) {

		foreach($list as $key) {

			if(!isset($arg[$key])) {
				throw new Exception($key.' is not set');

			}
		}
	}

	// check single require argument
	// arg is the require argument
	// src is the source list
	public function requireArg($arg, $src) {

		if(!isset($src[$arg])) {
			throw new Exception($arg.' is not set');
		}
	}

	// Add an record to the target model
	// list is the argument list to be added
	// arg is the source array that was not checked
	// model is the target model name
	// default is the argument with default value
	public function addRecord($list, $arg, $model, $default) {

		$this->argCheck($list, $arg);
		$file = $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/'.$model.'.php';
		require $file;

		$item = new $model();
		foreach($list as $tmp) {
			$item->$tmp = $arg[$tmp];
		}

		foreach($default as $key => $value) {
			$item->$key = $value;
		}
		$item->save();
	}

	// Search the record from target model
	// req is the qualification array[num][kv]
	// arg is the return type array[num]
	// model is the model string
	// return the search result as array[num][kv]
	public function searchRecord($req, $arg, $model) {
		
		$file = $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/'.$model.'.php';
		require $file;

		$item = new $model();
		return $item->search($req, $arg);
	}

	// update the record to the target model
	// req is the primary key array[num]
	// arg is the array to be updated array[num]
	// model is the target model
	// default is the key with defaule value array[kv]
	public function updateRecord($key, $arg, $src, $model, $default) {

		$this->argCheck($key, $src);
		$this->argCheck($arg, $src);

		$file = $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/'.$model.'.php';
		require $file;

		$item = new $model();
		foreach($key as $tmp) {
			$item->$tmp = $src[$tmp];
		}
		$argList = array();
		foreach($arg as $tmp) {
			$argList[$tmp] = $src[$tmp];
		}
		foreach($default as $tmp) {
			$argList[$tmp] = $src[$tmp];
		}

		$item->update($argList);
	}	
		


}


?>

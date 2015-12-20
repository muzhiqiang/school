<?php 

if(!isset($_POST['submit'])){
// illegal access

}

//include './route.php';

try {

	//$req = new APICaller($_GET['controller'], $_GET['method']);
	//$res = $req->run();

	$res = array();
	foreach($_GET as $key=>$val) {

		$res[$key] = $val;

	}
	var_dump ($res);

	// handle $res['data']
	// restriction
	exit();
}
catch (Exception $e) {

	// error handle
	// $e->getMessage();
	exit();
}

?>

<?php

require '../model/pod.php';

try {
	$db = new POD();

	$arg = array('a' => '1', 'b' =>'2' ,'c' =>'3');
	$req = array('ID' => '123', 'D' => '222');
	$table = 'sms';

	echo $db->genUpdateSql($req, $arg, $table); 

	$arg1 = array('a', 'b');
	$req1 = array(
	array('key' => 'ID','ID' => '123'),
	array('key' => 'Name', 'Name' =>'haha'));
	$table1 = 'sms';

	echo $db->genSearchSql($req1, $arg1, $table1);

	$arg2 = array('a', 'b');
	$req2 = array();
	$req2[0] = array('key' => 'ID', 'ID' => '123', 'table' =>'s');
	$lk = array('Name');
	$table2 = array('sms', 'msm');
	$map = array('s'=>'sms', 'm'=>'msm');

	echo $db->genLinkSql($req2, $lk, $arg2, $table2, $map);
}

catch(Exception $e) {

	echo $e->getMessage();
}

?>

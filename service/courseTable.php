<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';


	$_POST['Course_year_term'] = '20151';	
	$api = new APICaller();
	$result = $api->excute('course', 'showStudentYearCourseTable');

	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
		header('location:/school/404.php');
	}


	$num = 0;
	$id = array();
	foreach($result['data'] as $tmp) {
		$id[$num] = $tmp['Course_ID'];
		$time = $tmp['Teach_time'];
		$day = substr($time ,0 ,1);
		$subday = substr($time, 1, 1);
		$result['data'][$num]['day'] = intval($day);
		$result['data'][$num]['subday'] = intval($subday)/2 + 1;
		$num ++;
	}

	$res = array();
	for($i =1 ;$i <= 6; $i++) {
		$res[$i] = array();
		for($j = 1; $j<=7; $j++) {
			$res[$i][$j] = '<td></td>';
		}
	}
	foreach($result['data'] as $tmp) {
		$res[$tmp['subday']][$tmp['day']] = '<td>'.$tmp['Course'].'<br>'.$tmp['Classroom'].'</td>';
	}

	$table = array();
	for($i =1; $i <= 6; $i++) {
		$table[$i] = '';
		for($j = 1; $j <= 7; $j++) {
			$table[$i] = $table[$i].$res[$i][$j];
		}
	}

	$detail = array();
	$num = 0;

	foreach($id as $tmp) {
		
		$_POST['Course_ID'] = $tmp;
		$res = $api->excute('course', 'showDetailCourse');
		
		if($res['success'] != 1) {

			$_SESSION['errno'] = $detail[$num]['data'];
			header('location:/school/404.php');
		}
		$detail[$num] = $res['data'][0];
		$num++;
	}




?>

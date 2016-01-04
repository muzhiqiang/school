<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$year = $_GET['year'].$_GET['term'];
	$_POST['Course_year_term'] = $year;	

	$api = new APICaller();
	$result = $api->excute('course', 'showTeacherYearCourse');

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

	$res = '<tr><td>第一节课<br>第二节课</td>'.$table[1].'</tr>'.
	'<tr><td>第三节课<br>第四节课</td>'.$table[2].'</tr>'.
	'<tr><td>第五节课<br>第六节课</td>'.$table[3].'</tr>'.
	'<tr><td>第七节课<br>第八节课</td>'.$table[4].'</tr>'.
	'<tr><td>第九节课<br>第十节课</td>'.$table[5].'</tr>'.
	'<tr><td>第十一节课<br>第十二节课</td>'.$table[6].'</tr>';

	echo $res;

?>

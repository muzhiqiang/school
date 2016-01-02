<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$year = $_GET['year'].$_GET['term'];
	$_POST['Course_year_term'] = $year;

	$api = new APICaller();
	$detail = array();
	$num = 0;
	
	$result = $api->excute('course', 'showStudentYearCourseTable');

	if($result['success'] != 1) {
		$_SESSION['errno'] = $result['data'];
		header('location:/school/404.php');
	}

	foreach($result['data'] as $tmp) {
	
		$_POST['Course_ID'] = $tmp['Course_ID'];
		$detail[$num] = $api->excute('course', 'showDetailCourse');
		if($detail[$num]['success'] != 1) {
			$_SESSION['errno'] = $detail[$num]['data'];
			header('location:/school/404.php');
		}
		$detail[$num] = $detail[$num]['data'][0];
		$num++;
	}


	for($i =0; $i< $num; $i++) {
		$collapse = 'collapse'.$i;
		$res = '<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#courseDetail" href="#'.$collapse.'">
						'.$detail[$i]['Course'].'
					</a>
					</h4>
				</div>
				<div id='.$collapse.' class="panel-collapse collapse">
					<div class="panel-body">
						<p>授课老师：'.$detail[$i]['Tea_name'].'</p>
						<p>授课时间：'.$detail[$i]['Total_time'].'</p>
						<p>课程性质：'.$detail[$i]['Property'].'</p>
						<p>课程学分：'.$detail[$i]['Credit'].'</p>
						<p>课程简介：'.$detail[$i]['intro'].'</p>

					</div>
				</div>
			</div>';
			echo $res;
	}


?>

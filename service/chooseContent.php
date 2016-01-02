<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$year = $_GET['year'].$_GET['term'];
	$_POST['Course_year_term'] = $year;

	$api = new APICaller();
	$detail = array();
	$num = 0;
	
	$select = $api->excute('course', 'showStudentYearCourseTable');
	$id = array();


	if($select['success'] != 1) {
		echo $select['data'];
		exit();
	}

	foreach($select['data'] as $tmp) {
		array_push($id, $tmp['Course_ID']);
	}

	$choose = $api->excute('course', 'showYearCourse');
	if($choose['success'] != 1) {
		echo $choose['data'];
		exit();
	}


	$i = 0;
	foreach($choose['data'] as $tmp) {
		if(!in_array($tmp['Course_ID'], $id)) {

			$time = '星期'.substr($tmp['Teach_time'], 0, 1).' 第'.substr($tmp['Teach_time'], 1, 2).'节';
			$collapse = 'collapse'.$i;
			$res = '<div class="panel panel-default">
						<div class="panel-heading">
							<span class="panel-title">
								<a data-toggle="collapse" data-parent="#courseChoose" href="#'.$collapse.'">
										'.$tmp['Course'].'
								</a>
							</span>
							<span style="font-size:10px;margin-left:10px;">
									'.$tmp['Tea_name'].'
							</span>
							<span style="font-size:10px;margin-left:10px;">
									'.$tmp['Property'].'
							</span>
								<a class="pull-right" data-type = "'.$tmp['Course_ID'].'" href="#" onclick = "selectCourse(this)">确定</a>
						</div>
						<div id="'.$collapse.'" class="panel-collapse collapse">
							<div class="panel-body">
								<p>授课时间：'.$time.'</p>
								<p>授课周期：'.$tmp['Total_time'].'</p>
								<p>授课学分：'.$tmp['Credit'].'</p>
								<p>授课简介：'.$tmp['intro'].'</p>
							</div>
						</div>
					</div>';
			echo $res;
		}
		$i++;
	}


?>

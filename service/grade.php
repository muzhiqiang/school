<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';

	$list = array();
	$stu = array();
	$api = new APICaller();

	if(isset($_GET['Course_year_term'])) {
		$_POST['Course_year_term'] = $_GET['Course_year_term'];	

		$result = $api->excute('course', 'showTeacherYearCourse');

		if($result['success'] != 1) {
			$_SESSION['errno'] = $result['data'];
			header('location:/school/404.php');
		}
		$list = $result['data'];

	}
	if(isset($_GET['Course_ID'])) {
		$_POST['Course_ID'] = $_GET['Course_ID'];

		$result = $api->excute('course', 'studentList');
		if($result['success'] != 1) {
			$_SESSION['errno'] = $result['data'];
			header('location:/school/404.php');
		}
		$stu = $result['data'];
	}
	if(isset($_GET['count'])) {
		$_POST['Course_ID'] = $_GET['Course_ID'];
		for($i =0 ; $i<$_GET['count']; $i++) {
			$_POST['Stu_ID'] = $_POST['Stu_ID'.$i];
			$_POST['Score'] = $_POST['stu_grade'.$i];
			$result = $api->excute('course', 'updateStudentScore');
			if($result['success'] != 1) {
				$_SESSION['errno'] = $result['data'];
				header('location:/school/404.php');
			}
		}
	}
		

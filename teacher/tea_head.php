<?php 
	session_start();
	if(!isset($_SESSION['Account']) || $_SESSION['Type'] != 'teacher') {
		header('location:../login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>教师子系统</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>


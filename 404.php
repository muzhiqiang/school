<?php
	session_start();
	echo $_SESSION['errno'];
	unset($_SESSION['errno']);
?>

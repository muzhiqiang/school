<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/employee/emp_head.php'); ?>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/navbar.php'); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/employee/emp_leftSection.php'); ?>
			<div class='col-xs-10'>
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function (){
			$("#emp_homePage").addClass("active");
		})()
	</script>
</body>
</html>

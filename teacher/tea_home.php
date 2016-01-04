<?php require_once("tea_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10">
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function init() {
			$("#tea_manage_grade").addClass("active");
		}
		(function () {
			init();
		}) ();

	</script>
</body>

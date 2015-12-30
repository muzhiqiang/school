<?php require_once('stu_head.php'); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<?php

		// $_GET['controller'] = 'student';
		// $_GET['method'] = 'showInfo';
		// require('../route.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("stu_leftSection.php"); ?>
			<div class='col-xs-10'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>基本信息</span>
						</div>
					</div>
					<div class='panel-body text-center'>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">姓名：</p>
							<p class="col-xs-7 text-left">xxx</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">性别：</p>
							<p class="col-xs-7 text-left">男</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">学号：</p>
							<p class="col-xs-7 text-left">201333333333</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">学院：</p>
							<p class="col-xs-7 text-left">计算机科学与工程学院</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">专业：</p>
							<p class="col-xs-7 text-left">计算机科学与技术</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">年级：</p>
							<p class="col-xs-7 text-left">2013</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">入学时间：</p>
							<p class="col-xs-7 text-left">2013-09-01</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">班级：</p>
							<p class="col-xs-7 text-left">2班</p>
						</div>
					</div>
				</div>
			</div>
			<div class='col-xs-10'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>身份信息</span>
							<a href="#" class="pull-right" style="color:#428bca;" onclick="edit()" id="editBtn">修改</a>
						</div>
					</div>
					<div class='panel-body text-center'>
						<div id="identifyInfo">
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">宿舍号：</p>
								<p class="col-xs-7 text-left">C12-620</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">出生年月：</p>
								<p class="col-xs-7 text-left">1994/01/01</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">身份证号：</p>
								<p class="col-xs-7 text-left">44444455555555555</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">籍贯：</p>
								<p class="col-xs-7 text-left">广东</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">联系电话：</p>
								<p class="col-xs-7 text-left">18888888888</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">政治面貌：</p>
								<p class="col-xs-7 text-left">团员</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">民族：</p>
								<p class="col-xs-7 text-left">汉</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">健康状态：</p>
								<p class="col-xs-7 text-left">良好</p>
							</div>
						</div>
						<form action="" method="POST" role="form" class="form-horizontal hide" id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">宿舍号：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">出生年月：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name=""/>
									<span class="input-group-addon">年/月/日</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">身份证号：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">籍贯：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">联系电话：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">政治面貌：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">民族：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">健康状态：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<input type="button" class="btn btn-info" value="确定"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('../footer.php'); ?>
	<script type="text/javascript">
		(function () {
			$("#myInfo").addClass("active");
		}) ()
		function edit() {
			$("#editForm").removeClass("hide");
			$("#identifyInfo").addClass("hide");
			$("#editBtn").addClass("hide");
		}
	</script>
</body>
</html>
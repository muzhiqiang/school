<?php require_once("emp_head.php"); ?>
<body>
	<?php
		require_once("../navbar.php"); 
		require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/staffInfo.php';
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>基本信息</span>
						</div>
					</div>
					<div class='panel-body text-center'>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">职工编号：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Sta_ID']; ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">姓名：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Sta_name']; ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">性别：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Sex']; ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">入职时间：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Entry_time']; ?></p>
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
								<p class="col-xs-3 col-xs-offset-2">出生年月：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Birth']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">身份证号：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['ID_no']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">籍贯：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Native_place']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">居住地：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Address']; ?></p>
							</div>							
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">联系电话：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Tel']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">政治面貌：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Polit']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">民族：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Race']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">健康状态：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Health']; ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">教育经历：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data'][0]['Experience']; ?></p>
							</div>
						</div>
						<form action="/school/employee/emp_info.php?controller=staff&method=updateInfo" method="POST" role="form" class="form-horizontal hide" id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">出生年月：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Birth" value = "<?php echo $result['data'][0]['Birth']; ?>"/>
									<span class="input-group-addon">年/月/日</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">身份证号：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="ID_no" value = "<?php echo $result['data'][0]['ID_no']; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">籍贯：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Native_place" value = "<?php echo $result['data'][0]['Native_place']; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">居住地：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Address" value = "<?php echo $result['data'][0]['Address']; ?>"/>
								</div>
							</div>							
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">联系电话：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Tel" value = "<?php echo $result['data'][0]['Tel']; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">政治面貌：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Polit" value = "<?php echo $result['data'][0]['Polit']; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">民族：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Race" value = "<?php echo $result['data'][0]['Race']; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">健康状态：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Health" value = "<?php echo $result['data'][0]['Health']; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">教育经历：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Experience" value = "<?php echo $result['data'][0]['Experience']; ?>"/>
								</div>
							</div>
							<input type="submit" class="btn btn-info" value="确定"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>-
	<script type="text/javascript">
		(function (){
			$("#emp_info").addClass("active");
		})()
		function edit() {
			$("#editForm").removeClass("hide");
			$("#identifyInfo").addClass("hide");
			$("#editBtn").addClass("hide");
		}
	</script>
</body>
</html>

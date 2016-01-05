<?php require_once("emp_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<button class="btn btn-success" style="" onclick="addClassPage()">增添学生</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">班级ID</th>
									<th class="text-center">年</th>
									<th class="text-center">学院</th>
									<th class="text-center">专业</th>
									<th class="text-center">名称</th>
									<th class="text-center">辅导员</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($result['data']);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $result['data'][$i]['Class_ID']; ?></td>
									<td><?php echo $result['data'][$i]['Year']; ?></td>
									<td><?php echo $result['data'][$i]['Dept']; ?></td>
									<td><?php echo $result['data'][$i]['Major']; ?></td>
									<td><?php echo $result['data'][$i]['Class_name']; ?></td>
									<td><?php echo $result['data'][$i]['Sta_name']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="remove_class(<?php echo $result['data'][$i]['Class_ID']; ?>)">删除班级</button>
									</td>
								</tr>
								<?php }?>								
							</tbody>
						</table>
					</div>
				</div>

			</div>

			<div class='col-xs-10' id="addClassPage">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span class="pull-left">添加班级</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHome()">返回</button>
							</div>
						</div>
					</div>
					<div class='panel-body'>
						<form action="/school/employee/emp_manageAllClass.php?controller=classUnion&method=addClass" method="POST" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">学院：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Dept"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">专业：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Major"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">届：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Year"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">班级名称：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Class_name"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">辅导员ID：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Sta_id"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">简介：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Intro"/>
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
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function (){
			$("#emp_manageStudent").addClass("active");
		})()
	</script>
</body>
</html>

<?php require_once("emp_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>






			<div class='col-xs-10' id="home_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							班级列表
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">班级名称</th>
									<th class="text-center">进入班级</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>计科2班</td>
									<td>
										<button class="btn btn-info pull-right" style="position:relative;" onclick="enterClass()">班级详情</button>
									</td>
								</tr>								
							</tbody>
						</table>
					</div>
				</div>
			</div>





			<div class='col-xs-10' id="class_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
						班级详情
						<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
						</div>
					</div>
					<div class='panel-body text-center'>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">班级ID：</p>
							<p class="col-xs-7 text-left">2340982304</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">班级名称：</p>
							<p class="col-xs-7 text-left">计科2班</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">届：</p>
							<p class="col-xs-7 text-left">2013</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">专业：</p>
							<p class="col-xs-7 text-left">计算机科学与技术</p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">班长：</p>
							<p class="col-xs-5 text-left">车明宇</p>
							<p class="col-xs-2 text-center">
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="remove_monitor()">删除班长</button>
							</p>
						</div>
					</div>
				</div>

				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span class="pull-left">学生列表</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="add_student()">添加学生</button>
							</div>							
						</div>
					</div>
					<div class='panel-body text-center'>

						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">学生姓名</th>
									<th class="text-center">学号</th>
									<th class="text-center">联系电话</th>
									<th class="text-center">详细信息</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>黄炳麟</td>
									<td>
										201330550344
									</td>
									<td>
										1565146842
									</td>
									<td>
										<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="student_detail()">学生详情</button>
									</td>
								</tr>								
							</tbody>
						</table>
						
					</div>
				</div>

			</div>





			<div class='col-xs-10' id="add_student_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span class="">添加学生</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="enterClass()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form  method="POST" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">学号：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Birth" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">姓名：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Birth" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">性别：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Birth" />
								</div>
							</div>
							<input type="submit" class="btn btn-info" value="确定"/>
						</form>
					</div>
				</div>

			</div>







			<div class='col-xs-10' id="student_detail_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span class="">学生详情</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="enterClass()">返回</button>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="delete_student()">删除学生</button>
						</div>
					</div>
					<div class='panel-body text-center'>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">姓名：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['stu_name'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">性别：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['sex'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">学号：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['stu_id'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">学院：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['dept'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">专业：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['major'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">年级：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['grade'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">入学时间：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['enroll_time'] ?></p>
						</div>
						<div class="row">
							<p class="col-xs-3 col-xs-offset-2">班级：</p>
							<p class="col-xs-7 text-left"><?php echo $result['data']['class_name'] ?></p>
						</div>
						<div class="row">
								<p class="col-xs-3 col-xs-offset-2">宿舍号：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['loc'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">出生年月：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['birth'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">身份证号：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['id_no'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">籍贯：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['native_place'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">联系电话：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['tel'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">政治面貌：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['polit'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">民族：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['race'] ?></p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">健康状态：</p>
								<p class="col-xs-7 text-left"><?php echo $result['data']['health'] ?></p>
							</div>
					</div>
				</div>			
			</div>			





		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function (){
			$("#emp_manageOneClass").addClass("active");
			//$("#home_page").addClass("hide");
			$("#class_page").addClass("hide");
			$("#add_student_page").addClass("hide");
			$("#student_detail_page").addClass("hide");
		})()
		function enterClass(){
			$("#home_page").addClass("hide");
			$("#class_page").removeClass("hide");
			$("#add_student_page").addClass("hide");
			$("#student_detail_page").addClass("hide");
		}
		function add_student(){
			$("#home_page").addClass("hide");
			$("#class_page").addClass("hide");
			$("#add_student_page").removeClass("hide");
			$("#student_detail_page").addClass("hide");
		}
		function student_detail(){
			$("#home_page").addClass("hide");
			$("#class_page").addClass("hide");
			$("#add_student_page").addClass("hide");
			$("#student_detail_page").removeClass("hide");
		}			
		function return_home_page(){
			$("#home_page").removeClass("hide");
			$("#class_page").addClass("hide");
			$("#add_student_page").addClass("hide");
			$("#student_detail_page").addClass("hide");
		}				
	</script>
</body>
</html>
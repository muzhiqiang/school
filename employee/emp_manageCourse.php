<?php require_once("emp_head.php"); ?>
<body>
	<?php
		require_once("../navbar.php");
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/courseEmp.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10' id = 'homePage'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<button class="btn btn-success" style="" onclick="addClassPage()">增添课程</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">课程ID</th>
									<th class="text-center">课程名字</th>
									<th class="text-center">教师</th>
									<th class="text-center">性质</th>
									<th class="text-center">学期</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($result['data']);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $result['data'][$i]['Course_ID']; ?></td>
									<td><?php echo $result['data'][$i]['Course']; ?></td>
									<td><?php echo $result['data'][$i]['Tea_name']; ?></td>
									<td><?php echo $result['data'][$i]['Property']; ?></td>
									<td><?php echo $result['data'][$i]['Course_year_term']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="remove_course(<?php echo $result['data'][$i]['Course_ID']; ?>)">删除课程</button>
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
								<span class="pull-left">添加课程</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHome()">返回</button>
							</div>
						</div>
					</div>
					<div class='panel-body'>
						<form action="/school/employee/emp_manageCourse.php?controller=course&method=addCourse" method="POST" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">课程名字：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Course"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">教师ID：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Tea_ID"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">学期：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Course_year_term"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">课时：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Total_time"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">上课时间：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Teach_time"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">教室：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Classroom"/>
								</div>						
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">学分：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Credit"/>
								</div>						
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">性质：</label>
								<div class="col-xs-4">
									<select class="form-control" name="Property">
										<option value = '必修课'>必修课</option>
										<option value = '辅修课'>辅修课</option>
										<option value = '体育课'>体育课</option>
									</select>
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
			//$("#emp_manageCourse").addClass("active");
			returnHome();		
		})()
		function returnHome() {
			$("#homePage").removeClass("hide");
			$("#addClassPage").addClass("hide");
		}
		function addClassPage() {
			$("#homePage").addClass("hide");
			$("#addClassPage").removeClass("hide");
		}
		function remove_course(t) {
				$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Course_ID":t, "controller":"course", "method":"removeCourse"},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Successfully!");
						location.reload();
					}
					else {
						alert(data.data);
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});	
		}
	</script>
</body>
</html>

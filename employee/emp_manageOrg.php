<?php require_once("emp_head.php"); ?>
<body>
	<?php 
		require_once("../navbar.php"); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/unionEmp.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10' id = 'homePage'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<button class="btn btn-success" style="" onclick="addClassPage()">增添学生组织</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">学生组织ID</th>
									<th class="text-center">学生组织名字</th>
									<th class="text-center">简介</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($result['data']);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $result['data'][$i]['group_ID']; ?></td>
									<td><?php echo $result['data'][$i]['group_name']; ?></td>
									<td><?php echo $result['data'][$i]['Intro']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="remove_student_assocation(<?php echo $result['data'][$i]['group_ID']; ?>)">删除学生组织</button>
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
								<span class="pull-left">添加学生组织</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHome()">返回</button>
							</div>
						</div>
					</div>
					<div class='panel-body'>
						<form action="/school/employee/emp_manageOrg.php?controller=studentAssocation&method=addAssocation" method="POST" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">学生组织名字：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Group_name"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">简介：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Intro"/>
								</div>						
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">创始人ID：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Stu_ID"/>
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
			//$("#emp_manageOrg").addClass("active");
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
		function remove_student_assocation(t) {
				$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"group_ID":t, "controller":"studentAssocation", "method":"removeAssocation"},
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

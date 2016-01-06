<?php require_once("emp_head.php"); ?>
<body>
	<?php 
		require_once("../navbar.php"); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/studentEmp.php');	
	?>
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
									<th class="text-center">届</th>									
									<th class="text-center">学院</th>
									<th class="text-center">专业</th>			
									<th class="text-center">班级ID</th>
									<th class="text-center">班级名称</th>						
									<th class="text-center">进入班级</th>
								</tr>
							</thead>
							<tbody>
							<?php $num = count($result['data']);
								for($i=0; $i<$num; $i++) { ?>
								<tr>
									<td><?php echo $result['data'][$i]['Year']; ?></td>
									<td><?php echo $result['data'][$i]['Dept']; ?></td>
									<td><?php echo $result['data'][$i]['Major']; ?></td>
									<td><?php echo $result['data'][$i]['Class_ID']; ?></td>
									<td><?php echo $result['data'][$i]['Class_name']; ?></td>
									<td>
										<button class="btn btn-info pull-right" style="position:relative;" onclick="enter_Class(<?php echo $result['data'][$i]['Class_ID']; ?>)">班级详情</button>
									</td>
								</tr>	 <?php }?>							
							</tbody>
						</table>
					</div>
				</div>
			</div>





			<div class='col-xs-10' id="class_page">
				<!-- <div class='panel panel-default panel-block'>
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
				</div> -->

				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
						班级详情
						<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
						</div>
					</div>
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
									<th class="text-center">性别</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php $num = count($list['data']);
								for($i=0; $i<$num; $i++) { ?>
								<tr>
									<td><?php echo $list['data'][$i]['Stu_name']; ?></td>
									<td>
										<?php echo $list['data'][$i]['Stu_ID']; ?>
									</td>
									<td>
										<?php echo $list['data'][$i]['Sex']; ?>
									</td>
									<td>
										<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="remove_student(<?php echo $list['data'][$i]['Stu_ID']; ?>)">删除学生</button>
									</td>
								</tr>	<?php }?>							
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
						<form  method="POST" <role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">学号：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" id="Stu_ID" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">姓名：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" id="Stu_name" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">性别：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" id="Sex" />
								</div>
							</div>
							<input type="button" class="btn btn-info" onclick = "addStudent()" value="确定"/>
						</form>
					</div>
				</div>

			</div>
			<div class='col-xs-10' id="leader_page">
				<div class='col-xs-10' id="addExistCommitPage">
					<div class='panel panel-default panel-block'>
						<div class='panel-heading'>
							<div class='panel-title'>
								<div style="width:100%;height:25px;">
									<span class="pull-left">添加班长</span>
						
								</div>
							</div>
						</div>
						<div class='panel-body'>
							<form action="" method="POST" role="form" class="form-horizontal " id="editForm">
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入学生编号：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text"  id="leader_ID"/>
									</div>
								</div>
								<input type="button" class="btn btn-info" value="确定" onclick ="addLeader()"/>
							</form>
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
			$("#leader_page").addClass("hide");

			var url = location.href;
			var index = url.indexOf("?");
			if(index >0) {
				enterClass();
			}
		})()
		function enterClass(){
			$("#home_page").addClass("hide");
			$("#class_page").removeClass("hide");
			$("#add_student_page").addClass("hide");
			$("#student_detail_page").addClass("hide");
			$("#leader_page").addClass("hide");
		}
		function add_student(){
			$("#home_page").addClass("hide");
			$("#class_page").addClass("hide");
			$("#add_student_page").removeClass("hide");
			$("#student_detail_page").addClass("hide");
			$("#leader_page").removeClass("hide");	
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
			$("#leader_page").addClass("hide");
		}
		function enter_Class(t) {

			location.replace("/school/employee/emp_manageOneClass.php?controller=student&method=studentList&Class_ID="+t);
		}	

		function addStudent() {

			var id = document.getElementById("Stu_ID").value;
			var name = document.getElementById("Stu_name").value;
			var s = document.getElementById("Sex").value;
			var c <?php if(isset($_GET['Class_ID'])) echo ' = "'.$_GET['Class_ID'].'"';?> ;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Class_ID":c, "controller":"student", "method":"addStudent", "Sex":s, "Stu_name":name, "Stu_ID": id},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Add Successfully!");
						location.replace("/school/employee/emp_manageOneClass.php?controller=student&method=studentList&Class_ID="+c);
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

		function addLeader() {
			var c <?php if(isset($_GET['Class_ID'])) echo ' = "'.$_GET['Class_ID'].'"';?> ;
			var id = document.getElementById("leader_ID").value;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Class_ID":c, "controller":"classUnion", "method":"addClassMonitor","Stu_ID": id},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Add Successfully!");
						location.replace("/school/employee/emp_manageOneClass.php?controller=student&method=studentList&Class_ID="+c);
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

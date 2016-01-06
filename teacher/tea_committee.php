<?php require_once("tea_head.php"); ?>
<body>
	<?php
		require_once("../navbar.php");
		require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/committee.php';
	 ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10" id="home_page">
				<h3>你好 委员长</h3>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>最近消息</span>
						</div>
					</div>
					<div class='panel-body'>
					</div>
				</div>		

				<button class="btn btn-success pull-left"  onclick="manage_member()" <?php if($power < 4) echo 'disabled = "disabled"'; ?>>委员管理</button>
				<button class="btn btn-success pull-left"  onclick="start_evaluate()"<?php if($power < 4) echo 'disabled = "disabled"'; ?>>发起评价</button>
				<button class="btn btn-success pull-left"  onclick="manage_teacher()"<?php if($power < 1) echo 'disabled = "disabled"'; ?>>教师管理</button>		
				<button class="btn btn-success pull-left"  onclick="check_research()"<?php if($power < 1) echo 'disabled = "disabled"'; ?>>科研成果审核</button>
			</div>



			

			<div class="col-xs-10"id="m_mem">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							委员列表
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="add_committee_page()">添加委员</button>
						</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">委员ID</th>
									<th class="text-center">委员名称</th>
									<th class="text-center">委员性别</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($com);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $com[$i]['Tea_ID']; ?></td>
									<td><?php echo $com[$i]['Tea_name']; ?></td>
									<td><?php echo $com[$i]['Sex']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="remove_committee_member(<?php echo $com[$i]['Tea_ID']; ?>)">删除委员</button>
									</td>
								</tr>
								<?php }?>								
							</tbody>
						</table>
					</div>
					</div>
					<div class="panel-body">
					</div>
				</div>
			</div>

			<div class="col-xs-10"id="s_eva">
				<h2 class="text-center">确定发起评价?</h2>
				<div class="text-center">
					<button class="btn btn-success " style="position:relative;bottom:5px;" onclick="return_home_page()">确定</button>
					<button class="btn btn-success " style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
				</div>
			</div>

			<div class="col-xs-10"id="m_tea">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							教师列表
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="add_teacher_page()">添加教师</button>
						</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">教师ID</th>
									<th class="text-center">教师名称</th>
									<th class="text-center">教师性别</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($tea);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $tea[$i]['Tea_ID']; ?></td>
									<td><?php echo $tea[$i]['Tea_name']; ?></td>
									<td><?php echo $tea[$i]['Sex']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="remove_teacher(<?php echo $tea[$i]['Tea_ID']; ?>)">删除教师</button>
									</td>
								</tr>
								<?php }?>								
							</tbody>
						</table>
					</div>
					</div>
					<div class="panel-body">
					</div>
				</div>
			</div>

			<div class="col-xs-10"id="c_res">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							项目列表
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
						</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">项目ID</th>
									<th class="text-center">项目名称</th>
									<th class="text-center">科研小组</th>
									<th class="text-center">提交时间</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($pro);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $pro[$i]['Result_ID']; ?></td>
									<td><?php echo $pro[$i]['Project']; ?></td>
									<td><?php echo $pro[$i]['Res_group_name']; ?></td>
									<td><?php echo $pro[$i]['Result_time']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="accpet(<?php echo $pro[$i]['Result_ID']; ?>)">通过</button>
										<button class="btn btn-success" style=""onclick="refuce(<?php echo $pro[$i]['Result_ID']; ?>)">不通过</button>
									</td>
								</tr>
								<?php }?>								
							</tbody>
						</table>
					</div>
					</div>
					<div class="panel-body">
					</div>
				</div>
			</div>


			<div class="col-xs-10"id="add_teacher_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span class="">添加教师</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_manager_teacher_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form  method="POST" action="/school/teacher/tea_committee.php?page=2&controller=teacher&method=addTeacher" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">教师编号：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Tea_ID" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">教师姓名：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Tea_name" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">性别：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Sex" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">等级：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Rank" />
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">入职时间：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name="Entry_time" />
								</div>
							</div>
							<input type="submit" class="btn btn-info" value="确定"/>
						</form>
					</div>
				</div>
			</div>	
			<div class='col-xs-10' id="add_committee_page">
				<div class='col-xs-10' id="addExistCommitPage">
					<div class='panel panel-default panel-block'>
						<div class='panel-heading'>
							<div class='panel-title'>
								<div style="width:100%;height:25px;">
									<span class="pull-left">添加委员</span>	
									<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_manager_member_page()">返回</button>
								</div>
							</div>
						</div>
						<div class='panel-body'>
							<form action="" method="POST" role="form" class="form-horizontal " id="editForm">
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入教师编号：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text"  id="leader_ID"/>
									</div>
								</div>
								<input type="button" class="btn btn-info" value="确定" onclick ="add_committee()"/>
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
		function init() {
			$("#tea_committee").addClass("active");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").addClass("hide");
			$("#add_teacher_page").addClass("hide");
			$("#add_committee_page").addClass("hide");
		}
		function return_home_page(){
			$("#home_page").removeClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").addClass("hide");
			$("#add_teacher_page").addClass("hide");
			$("#add_committee_page").addClass("hide");
		}
		function manage_member(){
			$("#home_page").addClass("hide");
			$("#m_mem").removeClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").addClass("hide");
			location.replace('/school/teacher/tea_committee.php?page=1');
		}
		function start_evaluate(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").removeClass("hide");
			$("#c_res").addClass("hide");	
			$("#add_mem").addClass("hide");		
		}
		function manage_teacher(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").removeClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");	
			$("#add_mem").addClass("hide");	
			location.replace('/school/teacher/tea_committee.php?page=2');	
		}
		function add_teacher_page() {
			$("#m_tea").addClass("hide");
			$("#add_teacher_page").removeClass("hide");
		}
		function return_manager_teacher_page() {
			$("#m_tea").removeClass("hide");
			$("#add_teacher_page").addClass("hide");
		}
		function add_committee_page() {
			$("#m_mem").addClass("hide");
			$("#add_committee_page").removeClass("hide");
		}
		function return_manager_member_page() {
			$("#m_mem").removeClass("hide");
			$("#add_committee_page").addClass("hide");
		}
		function check_research(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").removeClass("hide");
			$("#add_mem").addClass("hide");	
			location.replace('/school/teacher/tea_committee.php?page=3');		
		}		
		(function () {
			init();
			var i= <?php if(isset($_GET['page'])) echo '"'.$_GET['page'].'"'; else echo '"0"'; ?>;
			if(i == "1") {
				$("#home_page").addClass("hide");
				$("#m_mem").removeClass("hide");
				$("#m_tea").addClass("hide");
				$("#s_eva").addClass("hide");
				$("#c_res").addClass("hide");
				$("#add_mem").addClass("hide");
			}
			if(i == "2") {
				$("#home_page").addClass("hide");
				$("#m_mem").addClass("hide");
				$("#m_tea").removeClass("hide");
				$("#s_eva").addClass("hide");
				$("#c_res").addClass("hide");	
				$("#add_mem").addClass("hide");	
			}
			if(i == "3") {
				$("#home_page").addClass("hide");
				$("#m_mem").addClass("hide");
				$("#m_tea").addClass("hide");
				$("#s_eva").addClass("hide");
				$("#c_res").removeClass("hide");
				$("#add_mem").addClass("hide");	
			}
				
		}) ();
		function add_committee() {
				var id = document.getElementById('leader_ID').value;				
				$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"teacher", "method":"addLeader","Tea_ID":id, "Authority":"1"},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						alert("Add Successfully!");
						location.replace('/school/teacher/tea_committee.php?page=1');
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}
		function accpet(t) {
				var id = <?php echo '"'.$_SESSION['Account'].'"'; ?>;
				$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"researchGroup", "method":"verifyProject","Result_ID":t, "Verify_statue":"通过", "Account":id},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						//alert("Add Successfully!");
						location.replace('/school/teacher/tea_committee.php?page=3');
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}

		function refuce(t) {
				var id = <?php echo '"'.$_SESSION['Account'].'"'; ?>;
				$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"researchGroup", "method":"verifyProject","Result_ID":t, "Verify_statue":"不通过", "Account":id},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						//alert("Add Successfully!");
						location.replace('/school/teacher/tea_committee.php?page=3');
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}

	</script>
</body>

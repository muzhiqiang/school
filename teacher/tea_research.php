<?php require_once("tea_head.php"); ?>
<body>
	<?php
		require_once("../navbar.php"); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/researchGroup.php');	
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10" id="home_page">

				<div class='panel panel-success panel-block' >
					<div class='panel-heading' >
						<div class='panel-title'>

							<div style="width:100%;height:25px;">
								<span class="pull-left">选择科研小组</span>
								<div class="form-group pull-left" style="position:relative;bottom:5px;">
									<select class="form-control" id="searchGroup" onchange = "select()">
									</select>
								</div>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="startRes()">成立科研小组</button>
							</div>

						</div>
					</div>
				</div>




			<!--	<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>最近消息</span>
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<?php 
								$num = count($message);
								for($i =0; $i<$num; $i++) {
							?>
							<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapse<?php echo $i ?>" style="cursor:pointer">
								<div class="panel-heading">
								<h4 class="panel-title" >
									<span>这周上交工作日志</span>
								</h4>
								</div>
								<div id="collapse<?php echo $i ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<p>请这周上交工作日志</p>
									</div>
								</div>
							</div>
							<?php } ?>  
						</div> 
					</div>
				</div> -->

				<div class='panel panel-warning panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>工作日志</span>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()" id ="mylog_btn" disabled ="disabled">我的日志</button>
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<?php
								$num = count($log);
								for($i =0 ; $i<$num; $i++) {
							?>
							<div class="panel panel-default" data-toggle="collapse"  data-parent="#courseDetail" href="#collapse<?php echo $i?>" style="cursor:pointer">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<span><?php $title = substr($log[$i]['Log_content'], 0, 9); echo $title ?></span>
										<span class="badge pull-right"><?php echo $log[$i]['Update_date']; ?></span>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<p><?php echo $log[$i]['Log_content'] ?></p>
									</div>
								</div>
							</div>
							<?php } ?> 
						</div>
					</div>
				</div>
				<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="manage_member()" id ="manager_btn" disabled ="disabled">管理成员</button>
				<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="ask_money()" id ="money_btn" disabled ="disabled">申报资金</button>
				<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="ask_medal()" id ="project_btn" disabled ="disabled">申报项目成果</button>			
			</div>

			<div class="col-xs-10 hide" id="group_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<sapn>科研小组创建</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>							
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" method = "POST" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">科研小组名称</label>
								<div class="col-sm-10">
									<input type="text" class="form-control"  placeholder="请输入名称" id="Res_group_name">
								</div>
							</div>
				
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">项目名称</label>
							 	<div class="col-sm-10">
								 	<input type="text" class="form-control" id = "project"></textarea>
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">项目简介</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" id = "Intro"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定" onclick = "stablish()">
						</form>
					</div>
				</div>

			</div>


			<div class="col-xs-10" id="my_log_page">
				<div style="width:100%;height:50px;">
					<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="new_log()">添加日志</button>
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
				</div>
				<div class="panel-group" id="message_detail">
					<?php 
							$num = count($mylog);
							for($i =0; $i < $num; $i++) {
					?>
					<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapse<?php echo $i?>" style="cursor:pointer">
						<div class="panel-heading">
							<h4 class="panel-title" >
								<span id = "<?php echo $mylog[$i]['Log_ID'].'title';?>"><?php $title = substr($mylog[$i]['Log_content'], 0, 9); echo $title ?></span>
								<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="remove_log(<?php echo $mylog[$i]['Log_ID'] ?>)">删除日志</button>
								<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="edit_log(<?php echo $mylog[$i]['Log_ID'] ?>)">编辑日志</button>
								<span class="badge pull-right"><?php echo $mylog[$i]['Update_date']; ?></span>
							</h4>
						</div>
						<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
							<div class="panel-body">
								<p id = "<?php echo $mylog[$i]['Log_ID'].'content';?>"><?php echo $mylog[$i]['Log_content']; ?></p>
							</div>
						</div>
					</div>
					<?php } ?> 
				</div>
			</div>

			<div class="col-xs-10" id="new_log_page">
				<div style="width:100%;height:50px;">
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()">取消添加</button>
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="add_log()">确定</button>
				</div>
				<form class="form-horizontal text-center" role="form" >
					<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label" >日志标题：</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="firstname" placeholder="请输入日志标题">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">日志内容：</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id = "name", data-type =""></textarea>
						</div>
					</div>
				</form>
			</div>






			<div class="col-xs-10" id="edit_log_page">
				<div style="width:100%;height:50px;">
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()">取消编辑</button>
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="update_log()">确定</button>
				</div>
				<form class="form-horizontal text-center" role="form" >
					<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label" >日志标题：</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="firstname" placeholder="请输入日志标题">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">日志内容：</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id = "name", data-type =""></textarea>
						</div>
					</div>
				</form>
			</div>






			<div class="col-xs-10" id="manage_member_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>管理成员</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">成员名称</th>
									<th class="text-center">职位</th>
									<th class="text-center">权限</th>
									<th class="text-center">删除成员</th>
								</tr>
							</thead>
							<tbody>
							<?php $num = count($member['data']);
								for($i=0; $i<$num; $i++) { ?>
								<tr>
									<td><?php echo $member['data'][$i]['Stu_name']; ?></td>
									<td><?php echo $member['data'][$i]['Member_type']; ?></td>
									<td>发布日志</td>
									<td>
										<button class="btn btn-info" style="position:relative;bottom:5px;" onclick="remove_member(<?php echo $member['data'][$i]['Member_ID']; ?>)">删除成员</button>	
									</td>
								</tr>	<?php }?>							
							</tbody>
						</table>
						<input type="button" class="btn btn-info text-center" value="确定">
					</div>
				</div>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							添加成员
						</div>
					</div>
					<div class='panel-body'>
						<form  method="POST" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入ID:</label>
								<div class="col-xs-4">
									<input class="form-control" type="text"  id="Stu_ID"/>
								</div>
							</div>
							<input type="button" class="btn btn-info" value="确定" onclick ="add_member()"/>
						</form>
					</div>
				</div>	
			</div>




			<div class="col-xs-10" id="ask_money_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>申报资金</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">申报金额：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="fundCount" placeholder="请输入金额">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">陈述：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" id="fundIntro"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定" onclick = "applyFund(<?php if(isset($_GET['Res_group_id'])) echo $_GET['Res_group_id'];?>)">
						</form>
					</div>
				</div>
			</div>




			<div class="col-xs-10" id="ask_medal_page">

				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<sapn>成果申请</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">成果名称</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="firstname" placeholder="请输入成果名称">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">成果描述</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" id = "name"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定" onclick = "applyProject(<?php if(isset($_GET['Res_group_id'])) echo $_GET['Res_group_id'];?>)">
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function init() {
			$("#tea_research").addClass("active");
			$("#my_log_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");	
			$("#new_log_page").addClass("hide");	
			$("#group_page").addClass("hide");	
		}
		(function () {
			init();
			var account = <?php echo $_SESSION['Account']; ?>;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account, "controller":"researchGroup", "method":"showTeacherGroup"},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.success);
					}
					else {
						var tmp = "<option>请选择</option>";
						for(var p in data.data) {

							tmp = tmp+'<option value="'+data.data[p].Res_group_id+'" >'+ data.data[p].Res_group_name+'</option>';
						}
						document.getElementById('searchGroup').innerHTML = tmp;
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
			var url = location.href;
			var index = url.indexOf("?");
			if(index > 0) {
				document.getElementById('manager_btn').disabled = false;
				document.getElementById('mylog_btn').disabled = false;
				document.getElementById('project_btn').disabled = false;
				document.getElementById('money_btn').disabled = false;
			}
		}) ();
		function my_log() {
			$("#my_log_page").removeClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");
			$("#new_log_page").addClass("hide");			
		}
		function return_home_page(){
			$("#my_log_page").addClass("hide");
			$("#home_page").removeClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");
			$("#new_log_page").addClass("hide");	
			$("#group_page").addClass("hide");		
		}
		function startRes() {
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");	
			$("#new_log_page").addClass("hide");
			$("#group_page").removeClass("hide");
		}
		function edit_log(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").removeClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");
			$("#new_log_page").addClass("hide");						
		}
		function manage_member(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").removeClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");	
			$("#new_log_page").addClass("hide");					
		}
		function ask_money(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").removeClass("hide");
			$("#ask_medal_page").addClass("hide");		
			$("#new_log_page").addClass("hide");				
		}
		function ask_medal(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").removeClass("hide");	
			$("#new_log_page").addClass("hide");					
		}	
		function new_log(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");	
			$("#new_log_page").removeClass("hide");					
		}			
		function select() {
			var id = document.getElementById('searchGroup').value;
			var type = "<?php echo $_SESSION['Type']; ?>";
			location.replace("/school/teacher/tea_research.php?controller=researchGroup&method=showGrouplog&Res_group_id="+id+"&type="+type);

		}	
		function applyProject(t) {
			var id = t;
			var intro = document.getElementById('firstname').value+document.getElementById('name').value;
			var date = new Date();
			var update_date = date.getFullYear()+"/"+date.getMonth()+"/"+date.getDate();	
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"researchGroup", "method":"addProject", "Res_group_ID": id, "Result_time": date, "Result_Intro":intro},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						alert("Add Project Successfully!");
						return_home_page();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}	
		function applyFund(t) {
			var id = "<?php echo $_SESSION['Account']; ?>";
			var count = document.getElementById('fundCount').value;
			var intro = document.getElementById('fundIntro').value;
			var date = new Date();
			var update_date = date.getFullYear()+"/"+date.getMonth()+"/"+date.getDate();	
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"fund", "method":"addFund", "Req_res_group_id": id, "Req_time": date, "Req_intro":intro, "Req_money":count},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						alert("Apply Successfully!");
						return_home_page();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}

		function stablish() {
			var id = "<?php echo $_SESSION['Account']; ?>";
			var rid = document.getElementById('Res_group_name').value;
			var project = document.getElementById('project').value;
			var intro = document.getElementById('Intro').value;	
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"researchGroup", "method":"addResearchGroup", "Res_group_name":rid , "project": project, "Intro":intro, "Account":id},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						alert("Establish group Successfully!");
						location.reload();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}
		function remove_member(t) {

			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"researchGroup", "method":"removeResearchGroupMember","Member_ID":t },
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						alert("Successfully Remove!");
						location.reload();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}
		function add_member() {
			var id = "<?php echo $_SESSION['Account']; ?>";
			var res_id <?php if(isset($_GET['Res_group_id'])) echo '= "'.$_GET['Res_group_id'].'"';?>;
			var date = new Date();			
			var create_date = date.getTime();
			var stu_id = document.getElementById('Stu_ID').value;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"researchGroup", "method":"addResearchGroupMember","Member_ID":create_date, "Stu_ID": stu_id,"Res_group_ID":res_id, "Tea_ID": id},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.data);
					}
					else {
						alert("Add Successfully!");
						location.reload();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}			
	</script>
</body>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_head.php'); ?>
<body>
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/navbar.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/researchGroup.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_leftSection.php') ?>
			<div class="col-xs-10" id="home_page">
				<div class='panel panel-info panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span class="pull-left">选择科研小组</span>
								<div class="form-group pull-left" style="position:relative;bottom:5px;">
									<select class="form-control" id="searchGroup" onchange = "select()">
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>




				<div class='panel panel-success panel-block'>
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
				</div>

				<div class='panel panel-warning panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>工作日志</span>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()">我的日志</button>
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<?php
								$num = count($log);
								for($i =0 ; $i<$num; $i++) {
							?>
							<div class="panel panel-warning" data-toggle="collapse"  data-parent="#courseDetail" href="#collapse<?php echo $i?>" style="cursor:pointer">
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
			</div>

			<div class="col-xs-10" id="my_log_page">
				<div class='panel panel-primary panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span >我的日志</span>
								<button class="btn btn-info" style="position:relative;bottom:5px;" onclick="new_log()">添加日志</button>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
							</div>
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<?php 
									$num = count($mylog);
									for($i =0; $i < $num; $i++) {
							?>
							<div class="panel panel-info" data-toggle="collapse" data-parent="#courseDetail" href="#collapse<?php echo $i?>" style="cursor:pointer">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<span id = "<?php echo $mylog[$i]['Log_ID'].'title';?>"><?php $title = substr($mylog[$i]['Log_content'], 0, 9); echo $title ?></span>
										<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="remove_log(<?php echo $mylog[$i]['Log_ID'] ?>)">删除日志</button>
										<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="edit_log(<?php echo $mylog[$i]['Log_ID'] ?>)">编辑日志</button>
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
				</div>



				
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

			<div class="col-xs-10" id="new_log_page">
				<div style="width:100%;height:50px;">
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()">取消添加</button>
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="add_log()">确定</button>
				</div>
				<form class="form-horizontal text-center" role="form" >
					<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label" >日志标题：</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="logtitle" placeholder="请输入日志标题">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">日志内容：</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id = "logcontent", data-type =""></textarea>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#stu_research").addClass("active");
			$("#my_log_page").addClass("hide");
			$("#edit_log_page").addClass("hide");	
			$("#new_log_page").addClass("hide");		
		}
		(function () {
			init();
			var account = <?php echo $_SESSION['Account']; ?>;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account, "controller":"researchGroup", "method":"showStudentGroup"},
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
		}) ();
		function new_log(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#new_log_page").removeClass("hide");
		}
		function my_log() {
			$("#my_log_page").removeClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#new_log_page").addClass("hide");
		}
		function return_home_page(){
			$("#my_log_page").addClass("hide");
			$("#home_page").removeClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#new_log_page").addClass("hide");
		}
		function edit_log(t){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").removeClass("hide");
			$("#new_log_page").addClass("hide");
			document.getElementById("name").value =	document.getElementById(t+"content").innerHTML;
			document.getElementById("firstname").value = document.getElementById(t+"title").innerHTML;
			$(document.getElementById("name")).attr('data-type',t);					
		}
		function select() {
			var id = document.getElementById('searchGroup').value;
			var type = "<?php echo $_SESSION['Type']; ?>";
			location.replace("/school/student/stu_research.php?controller=researchGroup&method=showGrouplog&Res_group_id="+id+"&type="+type);

		}
		function remove_log(t) {

			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Log_ID":t, "controller":"researchGroup", "method":"removeLog"},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.date);
					}
					else {
						alert("delete successfully!");
						location.reload();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});

		}

		function update_log(id) {
			var content = document.getElementById("name").value;
			var date = new Date();
			var update_date = date.getFullYear()+"/"+date.getMonth()+"/"+date.getDate();
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Log_ID":id, "Update_date":update_date, "Log_content":content, "controller":"researchGroup", "method":"updateLog"},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.date);
					}
					else {
						alert("Update successfully!");
						location.reload();
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});

		}
		function add_log() {
			var content = document.getElementById("logcontent").value;
			var date = new Date();
			var create_date = date.getFullYear()+"/"+date.getMonth()+"/"+date.getDate();
			var res_id <?php if(isset($_GET['Res_group_id'])) echo '= "'.$_GET['Res_group_id'].'"';?>;
			var id <?php
					echo '= "'.$_SESSION['Account'].'"';
				?>;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Res_group_ID":res_id, "Create_date":create_date, "Update_data":create_date, "Stu_ID":id, "Log_content":content, "controller":"researchGroup", "method":"addLog"},
				datatype : "json",
				async: true,
				success:function(data) {
					if(data.success != true) {
						alert(data.date);
					}
					else {
						alert("Add successfully!");
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

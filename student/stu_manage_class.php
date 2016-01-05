<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_head.php'); ?>
	<body>
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/navbar.php'); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/classManger.php');
	?>

	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_leftSection.php') ?>
			<div class="col-xs-10">
				<div id="home_page">
				<div style="width:100%;height:50px;">
					<span class="pull-left"><?php echo $class_name; ?></span>
					<span class="pull-right">我的职务：<?php echo $position; ?></span>
				</div>
			<!--	<div class="panel-group" >
					<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne" style="cursor:pointer">
						<div class="panel-heading">
							<h4 class="panel-title" >
								<span class="badge pull-left">计算机设计学院联谊</span>
								<span class="text-center">时间：2015.12.12</span>
								<span class="badge pull-right">地点：C12</span>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<p>请注意请注意，这周日要开会，时间是2341823，地点南校办公室！！</p>
							</div>
						</div>
					</div>
				</div> -->
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" <?php if($power<1) echo 'disabled = "true"';?>onclick="send_message()">发布消息</button>
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" <?php if($power<2) echo 'disabled = "true"';?>onclick="mang_mber()">管理班干</button>
				</div>
				
				<div id="send_message_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>发送通知</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">通知标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="message_title" placeholder="请输入消息标题">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">填写内容：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" id ="message_intro"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定" onclick = "send(<?php echo $class_id; ?>)">
						</form>
					</div>
				</div>
				</div>

				<div id="mang_mbr_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>管理成员</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">班干名称</th>
									<th class="text-center">职位</th>
									<th class="text-center">权限</th>
									<th class="text-center">删除班干</th>
								</tr>
							</thead>
							<tbody>
							<?php
								for($i =0 ;$i<$num; $i++) {
							?>
								<tr>
									<td><?php echo $result['data'][$i]['Stu_name']; ?></td>
									<td><?php echo $result['data'][$i]['Position']; ?></td>
									<td>
									<?php
										if($result['data'][$i]['Power'] == 2) {
											echo '发布消息 管理班干';
										}
										else {
											echo '发布消息';
										}
									?>		 
									</td>
									<td>
										<button class="btn btn-info" style="position:relative;bottom:5px;" onclick="remove_leader(<?php echo $result['data'][$i]['Stu_ID']; ?>)">删除成员</button>	
									</td>
								</tr>		
							<?php  } ?>						
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
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入学号：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text"  id = "Stu_ID", name="native_place"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入职位：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text"  id = "Position", name="native_place"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">请选择权限：</label>
								<div class="col-xs-4">
									<select class="form-control" id="Power">
										<option value = '1'>发布消息</option>
										<option value = '2'>发布消息 管理班干</option>
									</select>
								</div>
							</div>
							<input type="button" class="btn btn-info" value="确定" onclick = "add_leader()"/>
						</form>
					</div>
				</div>


				</div>
			</div>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#stu_manage_class").addClass("active");
			//$("#home_page").addClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").addClass("hide");
		}
		(function () {
			init();
			var url = location.href;
			var index = url.indexOf("?");
			if(index > 0)
				mang_mber();
		}) ();
		function return_home(){
			$("#home_page").removeClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").addClass("hide");
		}
		function send_message(){
			$("#home_page").addClass("hide");
			$("#send_message_page").removeClass("hide");
			$("#mang_mbr_page").addClass("hide");
		}
		function mang_mber(){
			$("#home_page").addClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").removeClass("hide");
			document.getElementById("Power").value = 1;
			document.getElementById("Position").value = "";
			document.getElementById("Stu_ID").value = "";
		}
		function send(t) {
			var message_title = document.getElementById("message_title").value;
			var message_text = document.getElementById("message_intro").value;
			var id = new Date().getTime();
			var account = "<?php echo $_SESSION['Account']; ?>";
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account, "Class_ID": t, "controller":"message", "method":"sendClassMessage", "Message_text":message_text, "Message_title":message_text, "message_id": id},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Send successfully!");

					}
					else {
						alert(data.data);
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
			document.getElementById("message_title").value = "";
			document.getElementById("message_intro").value = "";
			return_home();
		}
		function remove_leader(t) {
			var class_id = "<?php echo $class_id; ?>";
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Class_ID": class_id, "Stu_ID":t, "controller":"classUnion", "method":"removeClassLeader"},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Remove successfully!");
						location.replace("/school/student/stu_manage_class.php?");

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
		function add_leader(t) {
			var class_id = "<?php echo $class_id; ?>";
			var power = document.getElementById("Power").value;
			var position = document.getElementById("Position").value;
			var stu_id = document.getElementById("Stu_ID").value;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Class_ID": class_id, "Stu_ID":stu_id, "Position":position, "Power":power, "controller":"classUnion", "method":"addClassLeader"},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Add successfully!");
						location.replace("/school/student/stu_manage_class.php?");

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

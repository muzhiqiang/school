<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_head.php'); ?>
	<body>
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/navbar.php'); ?>

	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_leftSection.php') ?>
			<div class="col-xs-10">
				<div id="home_page">
				<div style="width:100%;height:50px;">
					<span class="pull-left">计科2班</span>
					<span class="pull-right">我的职务：团支书</span>
				</div>
				<div class="panel-group" >
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
				</div>
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="send_message()">发布消息</button>
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="mang_mber()">管理班干</button>
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
									<input type="text" class="form-control" id="firstname" placeholder="请输入消息标题">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">填写内容：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定">
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
								<tr>
									<td>黄炳麟</td>
									<td>团支书</td>
									<td>
											<input type="checkbox">发布消息
									</td>
									<td>
										<button class="btn btn-info" style="position:relative;bottom:5px;" onclick="">删除成员</button>	
									</td>
								</tr>								
							</tbody>
						</table>
						<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="add_member()">添加班干</button>
						<input type="button" class="btn btn-info text-center" value="确定">
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
		}
	</script>
</body>

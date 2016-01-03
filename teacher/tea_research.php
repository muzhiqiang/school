<?php require_once("tea_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10" id="home_page">
				<div style="width:100%;height:50px;">
					<span class="pull-left">选择科研小组</span>
					<div class="form-group pull-left" style="position:relative;bottom:5px;">
						<select class="form-control" id="term">
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
					</div>
				</div>

				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>最近消息</span>
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne" style="cursor:pointer">
								<div class="panel-heading">
								<h4 class="panel-title" >
									<span>这周上交工作日志</span>
								</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<p>请这周上交工作日志</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>工作日志</span>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()">我的日志</button>
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne" style="cursor:pointer">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<span >黄炳麟的工作日志</span>
										<span class="badge pull-right">2015.10.31</span>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<p>请注意请注意，这周日要开会，时间是2341823，地点南校办公室！！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="manage_member()">管理成员</button>
				<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="ask_money()">申报资金</button>
				<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick="ask_medal()">申报项目成果</button>			
			</div>

			<div class="col-xs-10" id="my_log_page">
				<div style="width:100%;height:50px;">
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
				</div>
				<div class="panel-group" id="message_detail">
					<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne" style="cursor:pointer">
						<div class="panel-heading">
							<h4 class="panel-title" >
								<span >黄炳麟的工作日志</span>
								<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="">删除日志</button>
								<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="edit_log()">编辑日志</button>
								<span class="badge pull-right">2015.10.31</span>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<p>第一个子系统已经完成</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-10" id="edit_log_page">
				<div style="width:100%;height:50px;">
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="my_log()">取消编辑</button>
					<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="">确定</button>
				</div>
				<form class="form-horizontal text-center" role="form">
					<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label">日志标题：</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="firstname" placeholder="请输入日志标题">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">日志内容：</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5"></textarea>
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
								<tr>
									<td>黄炳麟</td>
									<td>荣誉主席</td>
									<td>
											<input type="checkbox">发布活动</td>
									</td>
									<td>
										<button class="btn btn-info" style="position:relative;bottom:5px;" onclick="">删除成员</button>	
									</td>
								</tr>								
							</tbody>
						</table>
						<input type="button" class="btn btn-info text-center" value="确定">
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
									<input type="text" class="form-control" id="firstname" placeholder="请输入金额">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">陈述：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定">
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
								 	<textarea class="form-control" rows="5"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定">
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
		}
		(function () {
			init();
		}) ();
		function my_log() {
			$("#my_log_page").removeClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");			
		}
		function return_home_page(){
			$("#my_log_page").addClass("hide");
			$("#home_page").removeClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");			
		}
		function edit_log(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").removeClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");						
		}
		function manage_member(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").removeClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").addClass("hide");						
		}
		function ask_money(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").removeClass("hide");
			$("#ask_medal_page").addClass("hide");						
		}
		function ask_medal(){
			$("#my_log_page").addClass("hide");
			$("#home_page").addClass("hide");
			$("#edit_log_page").addClass("hide");
			$("#manage_member_page").addClass("hide");
			$("#ask_money_page").addClass("hide");
			$("#ask_medal_page").removeClass("hide");						
		}								
	</script>
</body>
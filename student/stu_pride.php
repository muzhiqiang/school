<?php require_once("head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./leftSection.php") ?>
			<div class="col-xs-10" id="prideInfo">
				<div style="width:100%;height:50px;">
					<div class="form-group pull-left" style="position:relative;bottom:5px;">
						<select class="form-control" id="year">
							<option>2013</option>
							<option>2014</option>
							<option>2015</option>
							<option>2016</option>
						</select>
					</div>
					<span class="pull-left">学年</span>
					<div class="form-group pull-left" style="position:relative;bottom:5px;">
						<select class="form-control" id="term">
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
					</div>
					<span class="pull-left">学期</span>
					<button class="btn btn-success pull-left" style="position:relative;bottom:5px;">查询</button>
					<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="apply()">申请</button>
				</div>
				<div class="panel-group" id="courseDetail">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne">
									C++设计大赛
								</a>
								<span style="font-size:10px;margin-left:10px;">安慰奖</span>
								<span class="badge pull-right">未通过</span>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<p>申请时间：2013-01-01</p>
								<p>审核状态：进行中</p>
								<p>荣誉描述：最权威的C++设计大赛</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#courseDetail" href="#collapseTwo">
									C++设计大赛
								</a>
								<span style="font-size:10px;margin-left:10px;">安慰奖</span>
								<span class="badge pull-right">已通过</span>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<p>申请时间：2013-01-01</p>
								<p>审核状态：进行中</p>
								<p>荣誉描述：最权威的C++设计大赛</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-10 hide" id="prideApply">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<sapn>奖项申请</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>	
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">获奖名称</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="firstname" placeholder="请输入获奖名称">
								</div>
							</div>
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">获奖时间</label>
								<div class="col-sm-3 text-center">
									<select class="form-control">
										<option>2013年</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
								<div class="col-sm-3 text-center">
									<select class="form-control">
										<option>1月</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
								<div class="col-sm-3 text-center">
									<select class="form-control">
										<option>1日</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">荣誉描述</label>
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
			$("#myPride").addClass("active");
		}
		(function () {
			init();
		}) ();
		function apply() {
			$("#prideInfo").addClass("hide");
			$("#prideApply").removeClass("hide");
		}
		function return_home(){
			$("#prideInfo").removeClass("hide");
			$("#prideApply").addClass("hide");
		}				
	</script>
</body>
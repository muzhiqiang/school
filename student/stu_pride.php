<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_head.php'); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<?php
		$_GET['controller'] = 'studentAward';
		$_GET['method'] = 'showAllAward';
		 require('../route.php');		 
		if($result['success'] != 1) {
			$_SESSION['errno'] = $result['data'];
		 	header('location:../404.php');
		}
		//print_r($result);
	?>

	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_leftSection.php') ?>
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

					<?php
						$num = count($result['data']);
						for($i =0; $i <$num; $i++) {
						$collapse = 'collapse'.$i;
						echo '<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#courseDetail" href=#'.$collapse.'>
										'.$result['data'][$i]['Award_name'].'
									</a>
									<span style="font-size:10px;margin-left:10px;">'.$result['data'][$i]['Award_Rank'].'</span>
									<span class="badge pull-right">'.$result['data'][$i]['Verify_statue'].'</span>
								</h4>
							</div>
							<div id='.$collapse.' class="panel-collapse collapse">
								<div class="panel-body">
									<p>申请时间：'.$result['data'][$i]['Award_time'].'</p>
									<p>审核状态：'.$result['data'][$i]['Verify_statue'].'</p>
									<p>荣誉描述：最权威的C++设计大赛</p>
								</div>
							</div>
						</div>';
						}
					?>	

					
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
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/footer.php'); ?>
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

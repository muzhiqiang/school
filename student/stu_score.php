<?php require_once("head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./leftSection.php") ?>
			<div class="col-xs-10">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>我的成绩</span>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;">查询</button>
							<span class="pull-right">学期</span>
							<div class="form-group pull-right" style="position:relative;bottom:5px;">
								<select class="form-control" id="term">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
							<span class="pull-right">学年</span>
							<div class="form-group pull-right" style="position:relative;bottom:5px;">
								<select class="form-control" id="year">
									<option>2013</option>
									<option>2014</option>
									<option>2015</option>
									<option>2016</option>
								</select>
								
							</div>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table text-center" id="courseTable">
							<thead>
								<tr>
									<th class="text-center">课程名称</th>
									<th class="text-center">课程成绩</th>
									<th class="text-center">排名</th>
									<th class="text-center">学分</th>
									<th class="text-center">课程性质</th>
									<th class="text-center">课程简介</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">C++程序</td>
									<td class="text-center">100</td>
									<td class="text-center">1</td>
									<td class="text-center">4.0</td>
									<td class="text-center">必修课</td>
									<td class="text-center">一门c++语言基础课</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<table class="table table-bordered text-center" id="courseTable">
								<thead>
									<tr>
										<th class="text-center">平均分</th>
										<th class="text-center">获得学分</th>
										<th class="text-center">绩点</th>
										<th class="text-center">班级排名</th>
										<th class="text-center">年级排名</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">95</td>
										<td class="text-center">29</td>
										<td class="text-center">3.8</td>
										<td class="text-center">15</td>
										<td class="text-center">20</td>
									</tr>
								</tbody>
							</table>
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
			$("#myScore").addClass("active");
		}
		(function () {
			init();
		}) ();
	</script>
</body>
<?php require_once("head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./leftSection.php") ?>
			<div class="col-xs-10">
				<div class='panel panel-default panel-block'>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">课程名称</th>
									<th class="text-center">教师</th>
									<th class="text-center">评分</th>
									<th class="text-center">评语</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>C++</td>
									<td>温桂花</td>
									<td>
										<select class="form-control" >
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>								
										</select>
									</td>
									<td>
										<input type="text" class="form-control"  placeholder="填写简短的评语">
									</td>
								</tr>
								<tr>
									<td>C--</td>
									<td>kinojada</td>
									<td>
										<select class="form-control" >
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>								
										</select>
									</td>
									<td>
										<input type="text" class="form-control"  placeholder="填写简短的评语">
									</td>
								</tr>								
							</tbody>
						</table>
						<input type="button" class="btn btn-info text-center" value="确定">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function init() {
			$("#stu_evaluate").addClass("active");
		}
		(function () {
			init();
		}) ();
	</script>
</body>
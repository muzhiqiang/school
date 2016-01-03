<?php
	require_once(dirname(__FILE__).'/stu_head.php');
	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/studentEvaluate.php';
	$result = json_decode($result['data']);
?>
<body>
	<?php require_once(dirname(dirname(__FILE__)).'/navbar.php'); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once(dirname(__FILE__).'/stu_leftSection.php') ?>
			<div class="col-xs-10">
				<div class='panel panel-default panel-block'>
					<div class='panel-body'>
					<form method="post" role="form" action="/school/service/studentAddEvaluate.php">
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">课程名称</th>
									<th class="text-center">教师</th>
									<th class="text-center">评分</th>
									<th class="text-center">评语</th>
									<input class="hide" value='<?php echo count($result); ?>' name="count">
								</tr>
							</thead>
							<tbody>
								<?php
									
									foreach ($result as $key => $value) {
										$value = (array)$value;
								?>
								<tr>
									<input class="hide" name="<?php echo 'Course_ID'.$key; ?>" value="<?php echo $value['Course_ID']; ?>">
									<td><?php echo $value['Course']; ?></td>
									<td><?php echo $value['Tea_name']; ?></td>
									<td>
										<select class="form-control" name="<?php echo 'Score'.$key; ?>">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>								
										</select>
									</td>
									<td>
										<input name="<?php echo 'Context'.$key; ?>" type="text" class="form-control"  placeholder="填写简短的评语">
									</td>
								</tr>
								<?php } ?>							
							</tbody>
						</table>
						<input type="submit" class="btn btn-info text-center" value="确定">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once(dirname(dirname(__FILE__)).'/footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#stu_evaluate").addClass("active");
		}
		(function () {
			init();
		}) ();
	</script>
</body>
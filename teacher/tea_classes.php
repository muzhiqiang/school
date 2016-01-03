<?php require_once("tea_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10">
				<div class='panel panel-default panel-block'>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="courseTable">
							<thead>
								<tr>
									<th></th>
									<th class="text-center">星期一</th>
									<th class="text-center">星期二</th>
									<th class="text-center">星期三</th>
									<th class="text-center">星期四</th>
									<th class="text-center">星期五</th>
									<th class="text-center">星期六</th>
									<th class="text-center">星期日</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>第一节课</td>
								</tr>
								<tr>
									<td>第二节课</td>
								</tr>
								<tr>
									<td>第三节课</td>
								</tr>
								<tr>
									<td>第四节课</td>
								</tr>
								<tr>
									<td>第五节课</td>
								</tr>
								<tr>
									<td>第六节课</td>
								</tr>
								<tr>
									<td>第七节课</td>
								</tr>
								<tr>
									<td>第八节课</td>
								</tr>
								<tr>
									<td>第九节课</td>
								</tr>
								<tr>
									<td>第十节课</td>
								</tr>
								<tr>
									<td>第十一节课</td>
								</tr>
								<tr>
									<td>第十二节课</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function () {
			$("#tea_classes").addClass("active");
		}) ();

	</script>
</body>
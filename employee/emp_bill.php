<?php require_once("emp_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10'>

				<div class='panel panel-default panel-block'>
					<div class='panel-body'>
						<div class='col-xs-3'>
							<div>目前余额：</div>
							<div>1000.00</div>
						</div>
						<div class='col-xs-3'>
							<div>本月支出：</div>
							<div>500.00</div>
						</div>
						<div class='col-xs-3'>
							<div>本月收入：</div>
							<div>1000.00</div>
						</div>
						<div class='col-xs-1'>
							<button class="btn btn-info " style="position:relative;" onclick="apply()">增加账目</button>
						</div>
					</div>
				</div>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							账目详细
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">借方</th>
									<th class="text-center">贷方</th>
									<th class="text-center">摘要</th>
									<th class="text-center">类型</th>
									<th class="text-center">金额</th>
									<th class="text-center">余额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>黄炳麟</td>
									<td>计算机学院</td>
									<td>学费</td>
									<td>1</td>
									<td>4000</td>
									<td>14000</td>
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
		(function (){
			$("#emp_bill").addClass("active");
		})()
	</script>
</body>
</html>
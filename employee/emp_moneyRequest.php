<?php require_once("emp_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10'>
				<ul class="nav nav-tabs">
				   <li id='doneTab'class="active" onclick="clickDoneTab()" style="cursor:pointer"><a >未审批</a></li>
				   <li id='needTab'onclick="clickNeedTab()" style="cursor:pointer"><a >已审批</a></li>
				</ul>
				<table class="table table-bordered text-center" id="evaluate_table">
					<thead>
						<tr>
							<th class="text-center">申请人</th>
							<th class="text-center">申请金额</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>黄炳麟</td>
							<td>
								1000.00
							</td>
							<td>
								<button class="btn btn-info " style="position:relative;bottom:5px;" onclick="agree()">同意</button>
								<button class="btn btn-info " style="position:relative;bottom:5px;" onclick="disagree()">拒绝</button>
							</td>
						</tr>								
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function (){
			$("#emp_moneyRequest").addClass("active");
		})()
		function clickDoneTab(){
			$("#doneTab").addClass("active");
			$("#needTab").removeClass("active");
		}
		function clickNeedTab(){
			$("#doneTab").removeClass("active");
			$("#needTab").addClass("active");
		}		
	</script>
</body>
</html>
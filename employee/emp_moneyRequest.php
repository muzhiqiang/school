<?php require_once("emp_head.php"); ?>
<body>
	<?php
	require_once("../navbar.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/fund.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10'>
				<ul class="nav nav-tabs">
				   <li id='doneTab'class="active" onclick="clickDoneTab()" style="cursor:pointer"><a >未审批</a></li>
				<!--   <li id='needTab'onclick="clickNeedTab()" style="cursor:pointer"><a >已审批</a></li> -->
				</ul>
				<table class="table table-bordered text-center" id="evaluate_table">
					<thead>
						<tr>
							<th class="text-center">申请人</th>
							<th class="text-center">申请时间</th>
							<th class="text-center">申请金额</th>
							<th class="text-center">申请原因</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$num = count($result['data']);
						for($i =0; $i<$num; $i++) {
					?>
						<tr>
							<td><?php echo $result['data'][$i]['Req_res_group_id']; ?></td>							
							<td><?php echo $result['data'][$i]['Req_time']; ?></td>
							<td><?php echo $result['data'][$i]['Req_money']; ?></td>							
							<td><?php echo $result['data'][$i]['Req_intro']; ?></td>
							<td>
								<button class="btn btn-info " style="position:relative;bottom:5px;" onclick="agree(<?php echo $result['data'][$i]['Req_id']; ?>)">同意</button>
								<button class="btn btn-info " style="position:relative;bottom:5px;" onclick="disagree(<?php echo $result['data'][$i]['Req_id']; ?>)">拒绝</button>
							</td>
						</tr>
					<?php } ?>								
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
		function agree(t) {
			location.replace("/school/employee/emp_moneyRequest.php?controller=fund&method=verifyFund&Verify_statue=通过&id="+t);
		}	
		function disagree(t) {
			location.replace("/school/employee/emp_moneyRequest.php?controller=fund&method=verifyFund&Verify_statue=不通过&id="+t);
		}	
	</script>
</body>
</html>

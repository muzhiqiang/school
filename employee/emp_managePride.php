<?php require_once("emp_head.php"); ?>
<body>
	<?php 
		require_once("../navbar.php"); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/prideEmp.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>
			<div class='col-xs-10' id = 'homePage'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<span class="pull-left">学生获奖审核</span>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>

									<th class="text-center">奖项名称</th>
									<th class="text-center">获奖者</th>
									<th class="text-center">获奖者ID</th>
									<th class="text-center">获奖时间</th>
									<th class="text-center">获奖简介</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($stu['data']);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $stu['data'][$i]['Award_name']; ?></td>
									<td><?php echo $stu['data'][$i]['Stu_name']; ?></td>
									<td><?php echo $stu['data'][$i]['Stu_ID']; ?></td>
									<td><?php echo $stu['data'][$i]['Award_time']; ?></td>
									<td><?php echo $stu['data'][$i]['Award_intro']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="acceptStu(<?php echo $stu['data'][$i]['Award_ID']; ?>)">通过</button>
										<button class="btn btn-success" style=""onclick="refuceStu(<?php echo $stu['data'][$i]['Award_ID']; ?>)">否决</button>									
									</td>
								</tr>
								<?php }?>								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class='col-xs-10' id = 'homePage'>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<span class="pull-left">老师获奖审核</span>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>

									<th class="text-center">奖项名称</th>
									<th class="text-center">获奖者</th>
									<th class="text-center">获奖者ID</th>
									<th class="text-center">获奖时间</th>
									<th class="text-center">获奖简介</th>
									<th class="text-center">操作</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($tea['data']);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>

									<td><?php echo $tea['data'][$i]['Award_name']; ?></td>
									<td><?php echo $tea['data'][$i]['Tea_name']; ?></td>
									<td><?php echo $tea['data'][$i]['Tea_ID']; ?></td>
									<td><?php echo $tea['data'][$i]['Award_time']; ?></td>
									<td><?php echo $tea['data'][$i]['Award_intro']; ?></td>
									<td>
										<button class="btn btn-success" style=""onclick="acceptTea(<?php echo $tea['data'][$i]['Award_ID']; ?>)">通过</button>
										<button class="btn btn-success" style=""onclick="refuceTea(<?php echo $tea['data'][$i]['Award_ID']; ?>)">否决</button>									
									</td>
								</tr>
								<?php }?>								
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
			//$("#emp_managePride").addClass("active");
		})()
		function acceptTea(t) {
			location.replace("/school/employee/emp_managePride.php?controller=teacherAward&method=VerifyAward&Verify_statue=通过&id="+t);
		}
		function refuceTea(t) {
			location.replace("/school/employee/emp_managePride.php?controller=teacherAward&method=VerifyAward&Verify_statue=不通过&id="+t);	
		}
		function acceptStu(t) {
			location.replace("/school/employee/emp_managePride.php?controller=studentAward&method=VerifyAward&Verify_statue=通过&id="+t);	
		}
		function refuceStu(t) {
			location.replace("/school/employee/emp_managePride.php?controller=studentAward&method=VerifyAward&Verify_statue=不通过&id="+t);		
		}
	</script>
</body>
</html>

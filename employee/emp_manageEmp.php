<?php require_once("emp_head.php"); ?>
<body>
	<?php
		require_once("../navbar.php");
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/empManager.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("emp_leftSection.php"); ?>





			<div class='col-xs-10' id="homePage">

				<div class='panel panel-warning panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<button class="btn btn-success" style="" onclick="addOfficer()">增添职员</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">姓名</th>
									<th class="text-center">职位</th>
									<th class="text-center">权限</th>
									<th class="text-center">删除职员</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = count($result['data']);
								for($i =0; $i < $num; $i++) {
							?>
								<tr>
									<td><?php echo $result['data'][$i]['Sta_name']; ?></td>
									<td><?php echo $result['data'][$i]['Position']; ?></td>
									<td>
									<?php 
										$power = $result['data'][$i]['Position'];
										if($power == '辅导员') {
											echo '辅导员';
										}
										if($power == '教务员') {
											echo '教务员';
										}
										if($power == '办公室') {
											echo '办公事';
										}
									?>
									</td>
									<td>
										<button class="btn btn-success" style=""onclick="remove_staff(<?php echo $result['data'][$i]['Sta_ID']; ?>)">删除成员</button>
									</td>
								</tr>
								<?php }?>								
							</tbody>
						</table>
					</div>
				</div>

				<div class='panel panel-info panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
								<button class="btn btn-success" style="" onclick="addCommitMem()">增添委员长</button>
						</div>
					</div>
				<!--	<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">姓名</th>
									<th class="text-center">职位</th>
									<th class="text-center">详细信息</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>黄炳麟</td>
									<td>校长</td>
									<td>
										<button class="btn btn-success" style=""onclick="Detail()">详细信息</button>
									</td>
								</tr>								
							</tbody>
						</table>
					</div> -->
				</div>

			</div>






			<div class='col-xs-10' id="addOfficerPage">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span class="pull-left">添加职员</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHomePage()">返回</button>
							</div>
						</div>
					</div>
					<div class='panel-body'>
						<form action="/school/employee/emp_manageEmp.php?controller=staff&method=addStaff" method="POST" role="form" class="form-horizontal " id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">职工编号：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Sta_id"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">姓名：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Sta_name"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">性别：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="sex"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">入职时间：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name="Entry_time"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">职位：</label>
								<div class="col-xs-4">
									<select class="form-control" name="Position">
										<option value = '教务员'>教务员</option>
										<option value = '辅导员'>辅导员</option>
										<option value = '办公室'>办公室</option>
									</select>
								</div>						
							</div>
							<input type="submit" class="btn btn-info" value="确定"/>
						</form>
					</div>
				</div>
			</div>





			<div class='col-xs-10' id="addCommitPage">
			<!--	<div class='col-xs-10' id="addNewCommitPage">
					<div class='panel panel-default panel-block'>
						<div class='panel-heading'>
							<div class='panel-title'>
								<div style="width:100%;height:25px;">
									<span class="pull-left">添加教师委员会委员长</span>
									<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHomePage()">返回</button>
								</div>
							</div>
						</div>
						<div class='panel-body'>
							<form action="" method="POST" role="form" class="form-horizontal " id="editForm">
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">教师编号：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text" name=""/>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">姓名：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text" name=""/>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">性别：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text" name=""/>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">入职时间：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text" name=""/>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">权限：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text" name=""/>
									</div>
								</div>
								<input type="button" class="btn btn-info" value="确定"/>
							</form>
						</div>
					</div>
				</div>
-->
				<div class='col-xs-10' id="addExistCommitPage">
					<div class='panel panel-default panel-block'>
						<div class='panel-heading'>
							<div class='panel-title'>
								<div style="width:100%;height:25px;">
									<span class="pull-left">添加教师委员会委员长</span>
									<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHomePage()">返回</button>
								</div>
							</div>
						</div>
						<div class='panel-body'>
							<form action="" method="POST" role="form" class="form-horizontal " id="editForm">
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入教师编号：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text"  id="Tea_ID"/>
									</div>
								</div>
								<input type="button" class="btn btn-info" value="确定" onclick ="committee()"/>
							</form>
						</div>
					</div>
				</div>

			</div>








			<div class='col-xs-10' id="detailPage">
				<div class='panel panel-default panel-block'>

					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span class="pull-left">教师：吴智强</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="returnHomePage()">返回</button>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="delete()">删除</button>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="edit()">修改</button>
							</div>
						</div>
					</div>


					<div class='panel-body'>

						<div id="baseInfo">
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">姓名：</p>
								<p class="col-xs-7 text-left">xxx</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">性别：</p>
								<p class="col-xs-7 text-left">男</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">教师编号：</p>
								<p class="col-xs-7 text-left">201333333333</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">入职时间：</p>
								<p class="col-xs-7 text-left">2013</p>
							</div>
						</div>


						<form action="" method="POST" role="form" class="form-horizontal hide" id="editForm">
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">出生年月：</label>
								<div class="col-xs-4 input-group" style="padding-left:15px;">
									<input class="form-control" type="text" name=""/>
									<span class="input-group-addon">年/月/日</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">身份证号：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">籍贯：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">居住地：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>							
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">联系电话：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">政治面貌：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">民族：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">健康状态：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-xs-3 col-xs-offset-2 text-center">教育经历：</label>
								<div class="col-xs-4">
									<input class="form-control" type="text" name=""/>
								</div>
							</div>
							<input type="button" class="btn btn-info" value="确定"/>
						</form>


						<div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">出生年月：</p>
								<p class="col-xs-7 text-left">1994/01/01</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">身份证号：</p>
								<p class="col-xs-7 text-left">44444455555555555</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">籍贯：</p>
								<p class="col-xs-7 text-left">广东</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">居住地：</p>
								<p class="col-xs-7 text-left">广东</p>
							</div>							
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">联系电话：</p>
								<p class="col-xs-7 text-left">18888888888</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">政治面貌：</p>
								<p class="col-xs-7 text-left">团员</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">民族：</p>
								<p class="col-xs-7 text-left">汉</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">健康状态：</p>
								<p class="col-xs-7 text-left">良好</p>
							</div>
							<div class="row">
								<p class="col-xs-3 col-xs-offset-2">教育经历：</p>
								<p class="col-xs-7 text-left">华南理工大学本科</p>
							</div>
						</div>

					</div>

				</div>
			</div>	




		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		(function (){
			$("#emp_manageEmp").addClass("active");
			$("#addOfficerPage").addClass("hide");
			$("#addCommitPage").addClass("hide");
			$("#detailPage").addClass("hide");
		})()
		function addOfficer(){
			$("#homePage").addClass("hide");
			$("#addOfficerPage").removeClass("hide");
			$("#addCommitPage").addClass("hide");
			$("#detailPage").addClass("hide");
		}
		function addCommitMem(){
			$("#homePage").addClass("hide");
			$("#addOfficerPage").addClass("hide");
			$("#addCommitPage").removeClass("hide");
			$("#detailPage").addClass("hide");
		}
		function Detail(){
			$("#homePage").addClass("hide");
			$("#addOfficerPage").addClass("hide");
			$("#addCommitPage").addClass("hide");
			$("#detailPage").removeClass("hide");
		}
		function returnHomePage(){
			$("#homePage").removeClass("hide");
			$("#addOfficerPage").addClass("hide");
			$("#addCommitPage").addClass("hide");
			$("#detailPage").addClass("hide");
		}	
		function remove_staff(t) {
			location.replace("/school/employee/emp_manageEmp.php?controller=staff&method=removeStaff&id="+t);		
		}
		function committee() {
			var id = document.getElementById('Tea_ID').value;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Tea_ID":id, "controller":"teacher", "method":"addLeader", "Authority":"4"},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Successfully!");
						returnHomePage();
					}
					else {
						alert(data.data);
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}	
	</script>
</body>
</html>

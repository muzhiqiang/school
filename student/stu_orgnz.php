<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_head.php'); ?>
<body>
	<?php
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/navbar.php'); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/studentAssocation.php'); 

	?>
	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_leftSection.php') ?>
			<div class="col-xs-10">

				<div id="activities_page">
				<div style="width:100%;height:50px;">
					<span class="pull-left">最近活动：</span>
					<div class="form-group pull-right" style="position:relative;bottom:5px;">
						<select class="form-control" id = "selectAssocation" onchange ="enterAssocation()">
							<option></option>
						<?php 
							$num = count($res['data']);
							for($i = 0; $i < $num; $i++) {
						?>
							<option value="<?php echo$res['data'][$i]['group_ID'];?>"><?php echo $res['data'][$i]['group_name']; ?></option>
						<?php }?>
						</select>
					</div>
					<span class="pull-right">进入我的组织：</span>
				</div>
				<div class="panel-group" id="">
					<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne" style="cursor:pointer">
						<div class="panel-heading">
							<h4 class="panel-title" >
								<span class="badge pull-left">计算机设计学院联谊</span>
								<span class="text-center">时间：2015.12.12</span>
								<span class="badge pull-right">地点：C12</span>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<p>请注意请注意，这周日要开会，时间是2341823，地点南校办公室！！</p>
							</div>
						</div>
					</div>
				</div>
				</div>

				<div id="orgnz_page">
				<div style="width:100%;height:50px;">
					<span class="pull-left"><?php if(isset($aso)) echo $aso['data'][0]['group_name']; ?></span>
					<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_act_page()">返回</button>	
					<span class="pull-right">我的职务：<?php if(isset($aso)) echo $aso['data'][0]['gro_position']; ?></span>
				</div>
				<div class="panel-group" >

					<div class="panel panel-default" data-toggle="collapse" data-parent="#courseDetail" href="#collapseOne" style="cursor:pointer">
						<div class="panel-heading">
							<h4 class="panel-title" >
								<span class="badge pull-left">计算机设计学院联谊</span>
								<span class="text-center">时间：2015.12.12</span>
								<span class="badge pull-right">地点：C12</span>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<p>请注意请注意，这周日要开会，时间是2341823，地点南校办公室！！</p>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="send_message()" <?php if(isset($aso) && $aso['data'][0]['power']<2) echo 'disabled = "true"';?>)>发布消息</button>
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="mang_mber()"<?php if(isset($aso) && $aso['data'][0]['power']<4) echo 'disabled = "true"';?>>管理成员</button>
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="publish_act()"><?php if(isset($aso) && $aso['data'][0]['power']<2) echo 'disabled = "true"';?>发布活动</button>	
				<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="leave_orgnz()">离开组织</button>	
				</div>
				
				<div id="send_message_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>发送消息</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_orgnz_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">消息标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="message_title" placeholder="请输入消息标题">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">填写内容：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" id="message_intro"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定" onclick ="send()">
						</form>
					</div>
				</div>
				</div>

				<div id="mang_mbr_page">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>管理成员</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_orgnz_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<table class="table table-bordered text-center" id="evaluate_table">
							<thead>
								<tr>
									<th class="text-center">成员名称</th>
									<th class="text-center">职位</th>
									<th class="text-center">权限</th>
									<th class="text-center">删除成员</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>黄炳麟</td>
									<td>荣誉主席</td>
									<td>
											<input type="checkbox">发布活动</td>
									</td>
									<td>
										
										<button class="btn btn-info" style="position:relative;bottom:5px;" onclick="">删除成员</button>	
									</td>
								</tr>								
							</tbody>
						</table>
						<input type="button" class="btn btn-info text-center" value="确定">
					</div>
				</div>
					
					<div class='panel panel-default panel-block'>
						<div class='panel-heading'>
							<div class='panel-title'>
								添加成员
							</div>
						</div>
						<div class='panel-body'>
							<form action="/school/student/stu_info.php?controller=student&method=updateInfo" method="POST" role="form" class="form-horizontal" id="editForm">
								<div class="form-group">
									<label for="" class="col-xs-3 col-xs-offset-2 text-center">请输入学号：</label>
									<div class="col-xs-4">
										<input class="form-control" type="text" name="Polit"/>
									</div>
								</div>
								<input type="submit" class="btn btn-info" value="确定"/>
							</form>
						</div>
					</div>

				</div>

				<div id="publish_act_page">
					<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>发布活动</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_orgnz_page()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">活动标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="firstname" placeholder="请输入活动标题">
								</div>
							</div>
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">活动时间</label>
								<div class="col-sm-3 text-center">
									<select class="form-control" id = "act_year">
										<option value = 2013>2013年</option>
										<option value = 2014>2014年</option>
										<option value = 2015>2015年</option>
										<option value = 2016>2016年</option>
									</select>
								</div>
								<div class="col-sm-3 text-center">
									<select class="form-control" id ="act_month">
									<?php
										for($i=1; $i<=12; $i++) {
									?>
										<option value="<?php echo $i; ?>"><?php echo $i;?>月</option>
									<?php }
									?>
									</select>
								</div>
								<div class="col-sm-3 text-center">
									<select class="form-control" id = "act_day">
									<?php
										for($i=1; $i<=31; $i++) {
									?>
										<option value="<?php echo $i; ?>"><?php echo $i;?>日</option>
									<?php }
									?>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="place" class="col-sm-2 control-label">活动地点：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="place" placeholder="请输入活动地点">
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">活动内容：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" id = "content"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定" onclick = "AddAct(<?php if(isset($_GET['group_ID'])) echo $_GET['group_ID'];?>)">
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('../footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#activities_page").addClass("hide");
			//$("#orgnz_page").addClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").addClass("hide");
			$("#publish_act_page").addClass("hide");
		}
		(function () {
			$("#stu_orgnz").addClass("active");
			var url = location.href;
			var index = url.indexOf("?");
			if(index < 0)
				return_act_page();
			else
				init();
		}) ();
		function return_orgnz_page(){
			$("#activities_page").addClass("hide");
			$("#orgnz_page").removeClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").addClass("hide");
			$("#publish_act_page").addClass("hide");
		}
		function return_act_page(){
			$("#activities_page").removeClass("hide");
			$("#orgnz_page").addClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").addClass("hide");
			$("#publish_act_page").addClass("hide");
		}		
		function send_message(){
			$("#activities_page").addClass("hide");
			$("#orgnz_page").addClass("hide");
			$("#send_message_page").removeClass("hide");
			$("#mang_mbr_page").addClass("hide");
			$("#publish_act_page").addClass("hide");
		}
		function mang_mber(){
			$("#activities_page").addClass("hide");
			$("#orgnz_page").addClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").removeClass("hide");
			$("#publish_act_page").addClass("hide");
		}
		function publish_act(){
			$("#activities_page").addClass("hide");
			$("#orgnz_page").addClass("hide");
			$("#send_message_page").addClass("hide");
			$("#mang_mbr_page").addClass("hide");
			$("#publish_act_page").removeClass("hide");
		}
		function enterAssocation() {
			var id = document.getElementById('selectAssocation').value;
			location.replace("/school/student/stu_orgnz.php?controller=studentAssocation&method=enterAssocation&group_ID="+id);	
		}
		function AddAct(t) {
			var group_id = t;
			var act_name = document.getElementById("firstname").value;
			var day = document.getElementById("act_day").value
			var act_position = document.getElementById("place").value
			var intro = document.getElementById("content").value
			var year = document.getElementById("act_year").value
			var month = document.getElementById("act_month").value
			var act_time = year+"/"+month+"/"+day;

			$.ajax({
				url:"/school/route.php",
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"controller":"studentAssocation", "method":"AddActivity","Group_ID":group_id, "Act_name":act_name, "Act_position":act_position, "Intro": intro, "Act_time":act_time},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Successfully!");
						$("#publish_act_page").addClass("hide");
						$("#orgnz_page").removeClass("hide");
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
		function send() {
			var message_title = document.getElementById("message_title").value;
			var message_text = document.getElementById("message_intro").value;
			var id = new Date().getTime();
			var account <?php if(isset($_GET['group_ID'])) echo '="'.$_GET['group_ID'].'"';?>;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"group_id":account, "controller":"message", "method":"sendStuGroupMessage", "Message_text":message_text, "Message_title":message_text, "message_id": id},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success = "true") {
						alert("Send successfully!");
						$("#send_message_page").addClass("hide");
						$("#orgnz_page").removeClass("hide");
					}
					else {
						alert(data.data);
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
			document.getElementById("message_title").value = "";
			document.getElementById("message_intro").value = "";
		}
	</script>
</body>

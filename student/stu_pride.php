<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school/student/stu_head.php'); ?>
<body>
	<?php
		 require_once("../navbar.php"); 
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_leftSection.php') ?>
			<div class="col-xs-10" id="prideInfo">
				<div style="width:100%;height:50px;">
					<div class="form-group pull-left" style="position:relative;bottom:5px;">
						<select class="form-control" id="searchYear">
							<option value = "2013">2013</option>
							<option value = "2014">2014</option>
							<option value = "2015">2015</option>
							<option value = "2016">2016</option>
						</select>
					</div>
					<span class="pull-left">学年</span>
					<div class="form-group pull-left" style="position:relative;bottom:5px;">
						<select class="form-control" id="searchTerm">
							<option value = "1">1</option>
							<option value = "2">2</option>
							<option value = "3">3</option>
						</select>
					</div>
					<span class="pull-left" >学期</span>
					<button class="btn btn-success pull-left" style="position:relative;bottom:5px;" onclick = "search()">查询</button>
					<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="apply()">申请</button>
				</div>
				<div class="panel-group" id="awardDetail">
					
				</div>
			</div>
			<div class="col-xs-10 hide" id="prideApply">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<sapn>奖项申请</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>	
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form" action="/school/service/AddRecord.php?type=<?php echo $_SESSION['Type']; ?>" method = "POST" id ="editform">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">获奖名称</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="firstname" placeholder="请输入获奖名称" name="Award_name">
								</div>
							</div>
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">获奖时间</label>
								<div class="col-sm-3 text-center">
									<select class="form-control" name = "applyYear">
										<option value = "2013">2013年</option>
										<option value = "2014">2014年</option>
										<option value = "2015">2015年</option>
										<option value = "2016">2016年</option>
									</select>
								</div>
								<div class="col-sm-3 text-center">
									<select class="form-control" name = "applyTerm">
										<option value = "1">1学期</option>
										<option value = "2">2学期</option>
										<option value = "3">3学期</option>
									</select>
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">荣誉描述</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5" name = "Award_intro"></textarea>
								</div>
							</div>
							<input type="submit" class="btn btn-info text-center" value="确定">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#myPride").addClass("active");
		}
		(function () {
			init();
		}) ();
		function apply() {
			$("#prideInfo").addClass("hide");
			$("#prideApply").removeClass("hide");
		}
		function return_home(){
			$("#prideInfo").removeClass("hide");
			$("#prideApply").addClass("hide");
		}	
		function search() {
			var term = document.getElementById('searchTerm').value;
			var year = document.getElementById('searchYear').value;
			var account = <?php echo $_SESSION['Account']; ?>;

			$.ajax({
				url:'/school/service/Award.php?term='+term+'&year='+year+'&type=<?php echo $_SESSION['Type']; ?>',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account},
				datatype : "text",
				async: true,
				success:function(data) {
					document.getElementById("awardDetail").innerHTML = data;				
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});	
		}
	</script>
</body>

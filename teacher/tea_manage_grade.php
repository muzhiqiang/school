<?php require_once("tea_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>

			<div class="col-xs-10" id="class_list_page">
				<div class="panel-group " id="courseDetail">
					<div class="panel panel-default">
						<div class="panel-heading" data-toggle="collapse" data-parent="#courseDetail" href="#collapseTwo">
							<div class="panel-title">
								<span>C++程序设计</span>
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="update_grade()">登记分数</button>		
							</div>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<p>申请时间：2013-01-01</p>
								<p>审核状态：进行中</p>
								<p>荣誉描述：最权威的C++设计大赛</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-10" id="student_list_page">
				<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>	
				<table class="table table-bordered text-center" id="evaluate_table">
					<thead>
						<tr>
							<th class="text-center">学生姓名</th>
							<th class="text-center">平时分数</th>
							<th class="text-center">考试分数</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>黄炳麟</td>
							<td>
								<input type="text" class="form-control" id="firstname" placeholder="">
							</td>
							<td>
								<input type="text" class="form-control" id="firstname" placeholder="">
							</td>
						</tr>								
					</tbody>
				</table>
				<input type="button" class="btn btn-info text-center" value="确定">
			</div>
		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function init() {
			$("#tea_manage_grade").addClass("active");
			//$("#class_list_page").addClass("hide");	
			$("#student_list_page").addClass("hide");	
		}
		(function () {
			init();
		}) ();
		function update_grade(){
			$("#class_list_page").addClass("hide");	
			$("#student_list_page").removeClass("hide");
		}
		function return_home(){
			$("#class_list_page").removeClass("hide");	
			$("#student_list_page").addClass("hide");
		}
	</script>
</body>

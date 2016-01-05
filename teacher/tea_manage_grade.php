<?php require_once("tea_head.php"); ?>
<body>
	<?php
		require_once("../navbar.php");
		require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/grade.php';
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>

			<div class="col-xs-10" id="class_list_page">

				<div class='panel panel-info panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<span class="pull-left">选择学年：</span>
								<div class="form-group pull-left" style="position:relative;bottom:5px;">
										<select class="form-control" id="year">
											<option value = '2013'>2013</option>
											<option value = '2014'>2014</option>
											<option value = '2015'>2015</option>
											<option value = '2016'>2016</option>
										</select>
								</div>
								<span class="pull-right" style="position:relative;top:5px;"></span>
								<div class="form-group pull-left" style="position:relative;bottom:5px;">
										<select class="form-control" id="term">
											<option value = '1'>1</option>
											<option value = '2'>2</option>
											<option value = '3'>3</option>
										</select>
								</div>
								<button class="btn btn-info pull-left" style="position:relative;bottom:5px;" onclick="select()">选择</button>
							</div>
						</div>
					</div>
					<div class='panel-body'>

						<div class="panel-group " id="courseDetail">
							<?php
								$num = count($list);
								for($i=0; $i <$num; $i++) {
							?>
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="panel-title">
										<span><?php echo $list[$i]['Course']; ?></span>
										<button class="btn btn-warning pull-right" style="position:relative;bottom:5px;" onclick="update_grade(<?php echo $list[$i]['Course_ID']; ?>)">登记分数</button>		
									</div>
								</div>
							</div>
							<?php } ?>
						</div>

					</div>
				</div>



			</div>

			<div class="col-xs-10" id="student_list_page">

				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<div style="width:100%;height:25px;">
								<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>	
							</div>
						</div>
					</div>
					<div class='panel-body'>

						<form method="post" role="form" action="/school/teacher/tea_manage_grade.php?<?php if(isset($_GET['Course_ID'])) echo 'Course_year_term='.$_GET['Course_year_term'].'&Course_ID='.$_GET['Course_ID'].'&count='.count($stu).'#'; ?>">
							<table class="table table-bordered text-center" id="evaluate_table">
								<thead>
									<tr>
										<th class="text-center">学生编号</th>
										<th class="text-center">学生姓名</th>
										<th class="text-center">考试分数</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$num = count($stu);
										for($i =0; $i<$num; $i++) {
									?>
									<tr>
										<td>
											<input type = "text"  class="form-control" name="<?php echo 'Stu_ID'.$i; ?>" value="<?php echo $stu[$i]['Stu_ID']; ?>">	
										</td>
										<td name="stu_name<?php echo $i; ?>"><?php echo $stu[$i]['Stu_name'] ?></td>
										<td>
											<input type="text" class="form-control" name="stu_grade<?php echo $i;?>" placeholder="">
										</td>
									</tr>								
									<?php } ?>
								</tbody>
							</table>
							<div class="text-center">
								<input type="submit" class="btn btn-info text-center" value="确定">
							</div>
						</form>

					</div>
				</div>

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
			var url = location.href;
			var index = url.indexOf("I");
			var index1 = url.indexOf("#");
			if(index > 0) {
				$("#class_list_page").addClass("hide");	
				$("#student_list_page").removeClass("hide");
			}
			if(index1 >0) {
				return_home();
			}
		}) ();
		function return_home(){
			$("#class_list_page").removeClass("hide");	
			$("#student_list_page").addClass("hide");
		}
		function select() {
			var year = document.getElementById('year').value;
			var term = document.getElementById('term').value;
			var Course_year_term = year+term;
			location.replace("/school/teacher/tea_manage_grade.php?Course_year_term="+Course_year_term);
		}
		function update_grade(id) {
			var Course_year_term <?php if(isset($_GET['Course_year_term'])) echo '= "&Course_year_term='.$_GET['Course_year_term'].'"';?>;
			location.replace("/school/teacher/tea_manage_grade.php?Course_ID="+id+Course_year_term);
		}
		
	</script>
</body>

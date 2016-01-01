<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_head.php'); ?>
<body>
	<?php 
		require_once("../navbar.php");
		require_once($_SERVER['DOCUMENT_ROOT'].'/school/service/courseTable.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_leftSection.php') ?>
			<div class="col-xs-10">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<button class="btn btn-success active" onclick="courseTable(this)" id="tableBtn">课程表</button>
							<button class="btn btn-info" onclick="courseDetail(this)" id="detailBtn">课程详情</button>
							<button class="btn btn-default" id="chooseBtn" onclick="courseChoose(this)">选课</button>
						
							<button class="btn btn-success pull-right">查询</button>
							
							
							<span class="pull-right" style="position:relative;top:5px;">学期</span>
							<div class="form-group pull-right">
								<select class="form-control" id="term">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
							<span class="pull-right" style="position:relative;top:5px;">学年</span>
							<div class="form-group pull-right">
								<select class="form-control" id="year">
									<option>2013</option>
									<option>2014</option>
									<option>2015</option>
									<option>2016</option>
								</select>
							</div>
						</div>
					</div>
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
							<?php
								echo '<tr><td>第一节课<br>第二节课</td>'.$table[1].'</tr>';
								echo '<tr><td>第三节课<br>第四节课</td>'.$table[2].'</tr>';
								echo '<tr><td>第五节课<br>第六节课</td>'.$table[3].'</tr>';
								echo '<tr><td>第七节课<br>第八节课</td>'.$table[4].'</tr>';
								echo '<tr><td>第九节课<br>第十节课</td>'.$table[5].'</tr>';
								echo '<tr><td>第十一节课<br>第十二节课</td>'.$table[6].'</tr>';

							?>
							</tbody>
						</table>
						<div class="panel-group hide" id="courseDetail">
						<?php
							$num =count($detail);
							for($i =0; $i< $num; $i++) {
								$collapse = 'collapse'.$i;
						?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#courseDetail" href="<?php echo '#'.$collapse;?>">
										<?php echo $detail[$i]['Course']; ?>
									</a>
								</h4>
							</div>
							<div id=<?php echo $collapse; ?> class="panel-collapse collapse">
								<div class="panel-body">
									<p>授课老师：<?php echo $detail[$i]['Tea_name']; ?></p>
									<p>授课时间：<?php echo $detail[$i]['Total_time']; ?></p>
									<p>课程性质：<?php echo $detail[$i]['Property']; ?></p>
									<p>课程学分：<?php echo $detail[$i]['Credit']; ?></p>
									<p>课程简介：<?php echo $detail[$i]['intro']; ?></p>

								</div>
							</div>
						</div>';
						<?php
							}
						?>

						</div>
						<div class="panel-group hide" id="courseChoose">
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="panel-title">
										<a data-toggle="collapse" data-parent="#courseChoose" href="#collapseOne">
											C++课程设计
										</a>
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第一二节
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第1~16周
									</span>
									<span style="font-size:10px;margin-left:10px;">
										有余量99
									</span>
									<a class="pull-right" href="#">确定</a>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<p>授课老师：xxx</p>
										<p>授课时间：第五周到第十六周</p>
										<p>课程性质：xxxxxxxx</p>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="panel-title">
										<a data-toggle="collapse" data-parent="#courseChoose" href="#collapseTwo">
											C++课程设计
										</a>
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第一二节
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第1~16周
									</span>
									<span style="font-size:10px;margin-left:10px;">
										有余量99
									</span>
									<a class="pull-right" href="#">确定</a>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<p>授课老师：xxx</p>
										<p>授课时间：第五周到第十六周</p>
										<p>课程性质：xxxxxxxx</p>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="panel-title">
										<a data-toggle="collapse" data-parent="#courseChoose" href="#collapseThree">
											C++课程设计
										</a>
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第一二节
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第1~16周
									</span>
									<span style="font-size:10px;margin-left:10px;">
										有余量99
									</span>
									<a class="pull-right" href="#">确定</a>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										<p>授课老师：xxx</p>
										<p>授课时间：第五周到第十六周</p>
										<p>课程性质：xxxxxxxx</p>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="panel-title">
										<a data-toggle="collapse" data-parent="#courseChoose" href="#collapseFour">
											C++课程设计
										</a>
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第一二节
									</span>
									<span style="font-size:10px;margin-left:10px;">
										第1~16周
									</span>
									<span style="font-size:10px;margin-left:10px;">
										有余量99
									</span>
									<a class="pull-right" href="#">确定</a>
								</div>
								<div id="collapseFour" class="panel-collapse collapse">
									<div class="panel-body">
										<p>授课老师：xxx</p>
										<p>授课时间：第五周到第十六周</p>
										<p>课程性质：xxxxxxxx</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/footer.php'); ?>
	<script type="text/javascript">
		(function () {
			$("#myCourse").addClass("active");
		}) ();
		function chooseWhich(btn) {
			$("#detailBtn").removeClass("active");
			$("#chooseBtn").removeClass("active");
			$("#backBtn").removeClass("active");
			$("#tableBtn").removeClass("active");
			$(btn).addClass("active");
		}
		function hideWhich(content) {
			$("#courseTable").addClass("hide");
			$("#courseDetail").addClass("hide");
			$("#courseChoose").addClass("hide");
			$("#courseBack").addClass("hide");
			$(content).removeClass("hide");
		}
		function courseTable(t) {
			chooseWhich(t);
			hideWhich(document.getElementById("courseTable"));
		}
		function courseDetail(t) {
			chooseWhich(t);
			hideWhich(document.getElementById("courseDetail"));

		}
		function courseChoose(t) {
			chooseWhich(t);
			hideWhich(document.getElementById("courseChoose"));
		}
	</script>
</body>

<?php require_once("tea_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10">
				<div class='panel panel-default panel-block'>
					<div class='panel_heading'>
						<div class ='panel-title'>
							<button class="btn btn-success pull-right" id = "searchBtn"  onclick ="search(this)">查询</button>
							<span class="pull-right" style="position:relative;top:5px;">学期</span>
							<div class="form-group pull-right">
								<select class="form-control" id="term">
									<option value = '1'>1</option>
									<option value = '2'>2</option>
									<option value = '3'>3</option>
								</select>
							</div>
							<span class="pull-right" style="position:relative;top:5px;">学年</span>
							<div class="form-group pull-right">
								<select class="form-control" id="year">
									<option value = '2013'>2013</option>
									<option value = '2014'>2014</option>
									<option value = '2015'>2015</option>
									<option value = '2016'>2016</option>
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
							<tbody id ="tableContent">
								<tr>
									<td>第一节课</td>
								</tr>
								<tr>
									<td>第二节课</td>
								</tr>
								<tr>
									<td>第三节课</td>
								</tr>
								<tr>
									<td>第四节课</td>
								</tr>
								<tr>
									<td>第五节课</td>
								</tr>
								<tr>
									<td>第六节课</td>
								</tr>
								<tr>
									<td>第七节课</td>
								</tr>
								<tr>
									<td>第八节课</td>
								</tr>
								<tr>
									<td>第九节课</td>
								</tr>
								<tr>
									<td>第十节课</td>
								</tr>
								<tr>
									<td>第十一节课</td>
								</tr>
								<tr>
									<td>第十二节课</td>
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
		(function () {
			$("#tea_classes").addClass("active");
		}) ();

		function search(t) {

			var term = document.getElementById('term').value;
			var year = document.getElementById('year').value;
			var account = <?php echo $_SESSION['Account']; ?>;

			$.ajax({
				url:'/school/service/teacherCourse.php?term='+term+'&year='+year,
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account},
				datatype : "text",
				async: true,
				success:function(data) {
					document.getElementById("tableContent").innerHTML = data;				
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}
	</script>
</body>

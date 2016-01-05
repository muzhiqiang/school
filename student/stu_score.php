<?php require_once("stu_head.php"); ?>
<body>
	<?php require_once(dirname(dirname(__FILE__))."/navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once(dirname(__FILE__)."/stu_leftSection.php") ?>
			<div class="col-xs-10">
				<div class='panel panel-warning panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>我的成绩</span>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="search(this)">查询</button>
							<span class="pull-right">学期</span>
							<div class="form-group pull-right" style="position:relative;bottom:5px;">
								<select class="form-control" id="term">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
							<span class="pull-right">学年</span>
							<div class="form-group pull-right" style="position:relative;bottom:5px;">
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
						<table class="table text-center" id="courseTable">
							<thead>
								<tr>
									<th class="text-center">课程名称</th>
									<th class="text-center">课程成绩</th>
									<th class="text-center">排名</th>
									<th class="text-center">学分</th>
									<th class="text-center">课程性质</th>
									<th class="text-center">课程简介</th>
								</tr>
							</thead>
							<tbody id="course_score">
								
							</tbody>
						</table>
					</div>
				</div>
				<div class='panel panel-info panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<table class="table table-bordered text-center" id="courseTable">
								<thead>
									<tr>
										<th class="text-center">平均分</th>
										<th class="text-center">获得学分</th>
									</tr>
								</thead>
								<tbody id="average_score">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once(dirname(dirname(__FILE__)).'/footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#myScore").addClass("active");
		}
		(function () {
			init();
		}) ();
		function search(t) {
			$(t).addClass('disabled');
			$(t).text('查询中');
			var year = $('#year').val();
			var term = $('#term').val();
			var year_term = year + '' + term;
			$.ajax({
				url:'/school/service/studentScore.php?Course_year_term='+year_term,
				method:'get',
				dataType: 'json',
				success: function (result) {
					$(t).removeClass('disabled');
					$(t).text('查询');
					if (!result['success']) {
						alert('服务器出错:'+result['data']);
					} else {
						var str = '';
						result = result['data'];
						result = JSON.parse(result);
						var score = 0;
						var credit = 0;
						for (var i = 0; i < result.length; i++) {
							str += '<tr>'+
										'<td>'+result[i]['Course']+'</td>'+
										'<td>'+result[i]['Score']+'</td>'+
										'<td>'+result[i]['rank']+'</td>'+
										'<td>'+result[i]['credit']+'</td>'+
										'<td>'+result[i]['Property']+'</td>'+
										'<td>'+result[i]['intro']+'</td>'+
									'</tr>';
							score += parseInt(result[i]['Score']);
							credit += parseFloat(result[i]['credit']);

						}
						$('#course_score').html(str);
						str = '<tr>'+
										'<td>'+score/result.length+'</td>'+
										'<td>'+credit+'</td>'+
									'</tr>';
						$('#average_score').html(str);
					}
					
					
				}
			})
		}
	</script>
</body>
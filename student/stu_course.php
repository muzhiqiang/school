<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_head.php'); ?>
<body>
	<?php 
		require_once("../navbar.php");
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
							<button class="btn btn-success pull-right" id = "searchBtn" data-type="tableContent" onclick ="search(this)">查询</button>
							
							
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
							<tbody id ='tableContent'>
								<tr><td>第一节课<br>第二节课</td></tr>
								<tr><td>第三节课<br>第四节课</td</tr>
								<tr><td>第五节课<br>第六节课</td></tr>
								<tr><td>第七节课<br>第八节课</td></tr>
								<tr><td>第九节课<br>第十节课</td></tr>
								<tr><td>第十一节课<br>第十二节课</td></tr>
							</tbody>
						</table>
						<div class="panel-group hide" id="courseDetail">


						</div>
						<div class="panel-group hide" id="chooseContent">
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
			$("#chooseContent").addClass("hide");
			$("#courseBack").addClass("hide");
			$(content).removeClass("hide");
		}
		function courseTable(t) {
			chooseWhich(t);
		    $(document.getElementById("searchBtn")).attr('data-type','tableContent');
			hideWhich(document.getElementById("courseTable"));

		}
		function courseDetail(t) {
			chooseWhich(t);
			$(document.getElementById("searchBtn")).attr('data-type','courseDetail');
			hideWhich(document.getElementById("courseDetail"));


		}
		function courseChoose(t) {
			chooseWhich(t);
			$(document.getElementById("searchBtn")).attr('data-type','chooseContent');
			hideWhich(document.getElementById("chooseContent"));
		}
		function search(t) {
			var type = $(t).attr('data-type');
			var term = document.getElementById('term').value;
			var year = document.getElementById('year').value;
			var account = <?php echo $_SESSION['Account']; ?>;

			$.ajax({
				url:'/school/service/'+type+'.php?term='+term+'&year='+year,
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account},
				datatype : "text",
				async: true,
				success:function(data) {
					document.getElementById(type).innerHTML = data;				
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					 alert(XMLHttpRequest.status);

				}
			});
		}
		function selectCourse(t) {
			var id = $(t).attr('data-type');
			var account = <?php echo $_SESSION['Account']; ?>;
			$.ajax({
				url:'/school/route.php',
				type:"POST",
				contentType:"application/x-www-form-urlencoded; charset=UTF-8",
				data : {"Account":account, "controller":"course", "method":"selectCourse", "Course_ID":id},
				datatype : "text",
				async: true,
				success:function(data) {
					if(data.success == true) {
						alert("Select successfully!");
						document.getElementById("tableContent").innerHTML = "";
						document.getElementById("courseDetail").innerHTML = "";
						courseChoose(document.getElementById('courseChoose'));
						search(document.getElementById('searchBtn'));

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

<?php require_once("tea_head.php"); ?>
<body>
	<?php require_once("../navbar.php"); ?>
	<div class='container'>
		<div class='row'>
			<?php require_once("./tea_left_section.php") ?>
			<div class="col-xs-10" id="home_page">
				<h3>你好 委员长</h3>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>最近消息</span>
						</div>
					</div>
					<div class='panel-body'>
					</div>
				</div>		

				<button class="btn btn-success pull-left"  onclick="manage_member()">委员管理</button>
				<button class="btn btn-success pull-left"  onclick="start_evaluate()">发起评价</button>
				<button class="btn btn-success pull-left"  onclick="manage_teacher()">教师管理</button>		
				<button class="btn btn-success pull-left"  onclick="check_research()">科研成果审核</button>
			</div>



			

			<div class="col-xs-10"id="m_mem">
				<div>
					
				</div>
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							委员列表
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
							<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="add_member()">添加委员</button>
						</div>
					</div>
					<div class="panel-body">
					</div>
				</div>
			</div>

			<div class="col-xs-10"id="s_eva">
				<h2 class="text-center">确定发起评价?</h2>
				<div class="text-center">
					<button class="btn btn-success " style="position:relative;bottom:5px;" onclick="return_home_page()">确定</button>
					<button class="btn btn-success " style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
				</div>
			</div>

			<div class="col-xs-10"id="m_tea">
				<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
			</div>

			<div class="col-xs-10"id="c_res">
				<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
			</div>


			<div class="col-xs-10"id="add_mem">
				<button class="btn btn-success pull-right" style="position:relative;bottom:5px;" onclick="return_home_page()">返回</button>
			</div>			

		</div>
	</div>
	<script src="../public/javascripts/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function init() {
			$("#tea_committee").addClass("active");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").addClass("hide");
		}
		function return_home_page(){
			$("#home_page").removeClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").addClass("hide");
		}
		function manage_member(){
			$("#home_page").addClass("hide");
			$("#m_mem").removeClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").addClass("hide");
		}
		function start_evaluate(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").removeClass("hide");
			$("#c_res").addClass("hide");	
			$("#add_mem").addClass("hide");		
		}
		function manage_teacher(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").removeClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");	
			$("#add_mem").addClass("hide");		
		}
		function check_research(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").removeClass("hide");
			$("#add_mem").addClass("hide");			
		}
		function add_member(){
			$("#home_page").addClass("hide");
			$("#m_mem").addClass("hide");
			$("#m_tea").addClass("hide");
			$("#s_eva").addClass("hide");
			$("#c_res").addClass("hide");
			$("#add_mem").removeClass("hide");			
		}		
		(function () {
			init();
		}) ();

	</script>
</body>
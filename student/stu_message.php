<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_head.php'); ?>
<body>
	<?php
		require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/navbar.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/service/message.php');
	?>
	<div class='container'>
		<div class='row'>
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/school'.'/student/stu_leftSection.php'); ?>
			<div class="col-xs-10" id="messageInfo">
				<div class='panel panel-warning panel-block'>
					<div class='panel-heading'>
						<div style="width:100%;height:25px;">
							<span class="pull-left">消息管理：</span>

							
						</div>
					</div>
					<div class='panel-body'>
						<div class="panel-group" id="message_detail">
							<?php 
								$num = count($message['data']);
								for($i =0 ;$i <$num; $i++) {
									$c = 'collapse'.$i;
							?>
							<div class="panel panel-success" data-toggle="collapse" data-parent="#courseDetail" href="#<?php echo $c; ?>" style="cursor:pointer">
								<div class="panel-heading">
									<h4 class="panel-title" >
										<span class="badge pull-left"><php echo $message['data'][$i]['Src_type'] ?></span>
										<span class="text-center"><php echo $message['data'][$i]['message_title'] ?></span>
						
									</h4>
								</div>
								<div id="<?php echo $c; ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<p><php echo $message['data'][$i]['message_text'] ?></p>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>







			<div class="col-xs-10 hide" id="messageSend">
				<div class='panel panel-default panel-block'>
					<div class='panel-heading'>
						<div class='panel-title'>
							<span>发送消息</span>
							<button class="btn btn-info pull-right" style="position:relative;bottom:5px;" onclick="return_home()">返回</button>
						</div>
					</div>
					<div class='panel-body'>
						<form class="form-horizontal text-center" role="form">
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">消息标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="firstname" placeholder="请输入消息标题">
								</div>
							</div>
							<div class="form-group">
								<label for="firstname" class="col-sm-2 control-label">选择消息范围：</label>
								<div class="col-sm-3 text-center">
									<select class="form-control">
										<option>2013年</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
							</div>
							<div class="form-group">
							 	<label for="name" class="col-sm-2 control-label">填写内容：</label>
							 	<div class="col-sm-10">
								 	<textarea class="form-control" rows="5"></textarea>
								</div>
							</div>
							<input type="button" class="btn btn-info text-center" value="确定">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('../footer.php'); ?>
	<script type="text/javascript">
		function init() {
			$("#stu_message").addClass("active");
		}
		(function () {
			init();
		}) ();
		function send() {
			$("#messageInfo").addClass("hide");
			$("#messageSend").removeClass("hide");
		}
		function return_home(){
			$("#messageInfo").removeClass("hide");
			$("#messageSend").addClass("hide");
		}
	</script>
</body>

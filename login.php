<?php require_once('./route.php'); ?>
<?php 
	if(isset($result) && $result['success'] == true) {
		switch($_SESSION['Type']) {
			case 'student':				
				header('location:./student/stu_info.php');
				break;
			case 'teacher':
				break;
			case 'staff':
				break;	
		}
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>登录</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php require_once('./navbar.php'); ?>
		<form class="form-horizontal" role="form" method="POST" action="login.php?controller=account&method=login">
			<div class="form-group">
				<label for="firstname" class="col-sm-4 control-label">用户名</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="ID" placeholder="请输入用户名">
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-4 control-label">密码</label>
				<div class="col-sm-4">
					<input type="password" class="form-control" name="Password" placeholder="请输入密码">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<div class="radio">
						<label>
							<input type="radio" name='Type' value='student'> 学生
						</label>
						<label>
							<input type="radio" name='Type' value='teacher'> 老师
						</label>
						<label>
							<input type="radio" name='Type' value='staff'> 员工
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<button type="submit" class="btn btn-default">登录</button>
				</div>
			</div>
		</form>
	</body>
	<?php require_once('./footer.php'); ?>
	<script type="text/javascript">
		$('#logoutBtn').addClass('hide');
	</script>
</html>

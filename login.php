
<!DOCTYPE html>
<html>
	<head>
		<title>登录</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="./public/css/platform.min.css" rel="stylesheet">
	</head>
	<body style="background-image:url(./public/img/background2.jpg)">
			<?php require_once('./navbar.php'); ?>


			<div class="dsg-sign"  >

				<div class="dsg-form">
					<h1><i>Welcome</i></h1>
					<h4>请再下方输入用户名和密码</h4>
					


					<form id="bkr-form-login" role="form" action="/school/service/login.php" method="POST">
						<div class="form-group">
							<input class="form-control input-lg dsg-email" name="ID" placeholder="用户名" type="text" value="">
							<input class="form-control input-lg dsg-password" name="Password" placeholder="密码" type="password" value="">
						</div>
						<div class="form-group">
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
						<input class="btn btn-primary btn-block btn-uppercase btn-lg" id="bkr-btn-submit-signin" name="submit" type="submit" value="Sign in">
					</form>


				</div>
			</div>

	</body>
	<?php require_once('./footer.php'); ?>
	<script type="text/javascript">
		$('#logoutBtn').addClass('hide');
	</script>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<!-- Head -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript">
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<meta charset utf="8">

<head>
	<!--font-awsome-css-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--bootstrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--custom css-->
	<link href="css/change.css" rel="stylesheet" type="text/css">
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<!--component-css-->
	<script src="travel/js/jquery-2.1.4.min.js"></script>
	<script src="travel/js/bootstrap.min.js"></script>
	<!--script-->
	<script src="travel/js/modernizr.custom.js"></script>
	<script src="travel/js/bigSlide.js"></script>
	<script>
		$(document).ready(function() {
			$('.menu-link').bigSlide();
		});
	</script>
	<title>欢迎使用微日记</title>
	<!-- web-fonts -->
	<link href='http://fonts.useso.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<div class="body-back">
		<div class="masthead pdng-stn1">
			<div class="phone-box wrap push" id="home">
				<div class="menu-notify">
					<div class="Profile-mid">
						<h5 class="pro-link"><a href="welcome.php">微日记</a></h5>
					</div>
					<div class="Profile-right">
					<?php
						if (isset($_SESSION['username'])) 
						{
							$name = $_SESSION['username'];
							
						}
						else
						$name = '游客';
						if(isset($_SESSION['username']))
						echo("<a style='float:right' href='./logic/logout.php' class='logout'> 
						<i class='fa fa-sign-out'></i></a>");
						echo "<a style='float:right'>$name , 你好！</a>";
						?>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- banner -->
				<div class="container">
		<div class="login_cont">
			<div class="login_nav">
				<div class="nav_slider">
					<a class="signup focus">修改资料</a>
				</div>
			</div>
			<form name="signup" action="logic/change_server.php" method="post">
				<div class="input_signup active">
					<?php
include "./logic/connect.php";
?>
					<input class="input" id="user_name" name="name" type="text" aria-label="用户名" placeholder="新用户名">
					<div class="hint">请填写符合格式的用户名</div>
					<input class="input" id="user_email" name="email"  type="text" aria-label="邮箱" placeholder="新邮箱">
					<div class="hint">请填写邮箱</div>
					<input class="input" id="password" type="password" name="password" aria-label="密码" placeholder="新密码（不少于 6 位）">
					<div class="hint">请填写符合格式的密码</div>
					<input class="input" id="repassword" type="password" aria-label="密码" placeholder="再次输入密码">
					<div class="hint">请再次输入密码</div>
					<input type="submit" id="submit" class="button" name="submit" value="立即修改">
				</div>
			</form>
		</div>
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/form.js"></script>
		<script type="text/javascript" src="js/config.js"></script>
</body>
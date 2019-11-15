<?php
session_start();//启用php的session功能
?>
<!DOCTYPE html>
<html lang="zh-CN">
<!-- Head -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

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
	<title>欢迎使用微日记</title>
</head>

<body>
<!-- banner -->
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
							$name = $_SESSION['username'];//用于显示用户名
						}
						else
						$name = '游客';//处理未登录访问
						if(isset($_SESSION['username']))//防止出现未登录退出的逻辑错位
						echo("<a style='float:right' href='./logic/logout.php' class='logout'>
						<i class='fa fa-sign-out'></i></a>");//用于显示登出按钮
						echo "<a style='float:right'>$name , 你好！</a>";
					?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="container">
		<div class="login_cont">
			<div class="login_nav">
				<div class="nav_slider">
					<a class="signup focus">修改资料</a>
				</div>
			</div>
			<!-- 使用表单向信息change_server.php以POST方式发送修改后的个人资料 -->
			<form name="signup" action="logic/change_server.php" method="post">
				<div class="input_signup active">
					<?php
include "./logic/connect.php";//连接数据库
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
		<!-- scripts 用来完成格式判断和提示显示-->
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/form.js"></script>
		<script type="text/javascript" src="js/config.js"></script>
</body>
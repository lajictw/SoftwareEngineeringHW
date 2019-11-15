<?php
//本php文件用于教师用户的登录或者注册
include("./logic/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<!-- Head -->

<head>
	<title>注册或登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="" />

	<script src="js/jquery-1.10.2.js"></script>


	<!-- default css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!--web font-->
	<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="login_cont">
			<div class="login_nav">
				<div class="nav_slider">
					<!-- 选择注册或者登录 -->
					<a href="#" class="signup focus">注册</a>
					<a href="#" class="signin">登录</a>
				</div>
			</div>
			
			<form name="signup" action="logic/signup.php?type=2" method="post">
				<div class="input_signup active">
				<div class="userhint">
				<!-- 教师账号注册 -->
				<a>你当前要注册的是教师账号</a>
			</div>
					<input class="input" id="user_name" name="name" type="text" aria-label="用户名（包含字母／数字／下划线" placeholder="用户名">
					<div class="hint">请填写符合格式的用户名</div>
					<input class="input" id="user_email" name="email"  type="text" aria-label="邮箱" placeholder="邮箱">
					<div class="hint">请填写邮箱</div>
					<!-- <div class="hint">请选择账号类型</div> -->
					<input class="input" id="password" type="password" name="password" aria-label="密码" placeholder="密码（不少于 6 位）">
					<div class="hint">请填写符合格式的密码</div>
					<input class="input" id="repassword" type="password" aria-label="密码" placeholder="再次输入密码">
					<div class="hint">请再次输入密码</div>
					<input type="submit" id="submit" class="button" name="submit" value="注册">
				</div>
			</form>
			<form name="signin" action="logic/signin.php" method="post">
			<!-- 教师账号登录 -->
				<div class="input_signin">
					<input class="input" id="login_user_name"name="name" type="text" aria-label="用户名" placeholder="用户名">
					<div class="hint">请输入用户名</div>
					<input class="input" id="login_password" name="password" type="password" aria-label="密码" placeholder="密码">
					<div class="hint">请输入密码</div>
					<input type="submit" id="button" class="button" name="submit" value="登录">
						
				</div>
			</form>
		</div>

		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/form.js"></script>
		<script type="text/javascript" src="js/config.js"></script>
		<!-- <script type="text/javascript" src="js/login_ajax.js"></script> -->
</body>
</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
	<title>About</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="" />

	<script src="js/jquery-1.10.2.js"></script>


<!-- <style>
ul
{
	list-style-type:none;
	margin:0;
	padding:0;
}
a:link,a:visited
{
	display:block;
	font-weight:bold;
	color:#FFFFFF;
	background-color:#98bf21;
	width:120px;
	text-align:center;
	padding:4px;
	text-decoration:none;
	text-transform:uppercase;
}
a:hover,a:active
{
	background-color:#7A991A;
}
</style> -->


	<!-- default css files -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/test.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!-- <link rel="stylesheet" herf="button_test.css"> -->
	<!-- default css files -->

	<!--web font-->
	<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!--//web font-->


	<!-- Body -->
</head>
<body>
	<div class="row">
		<div class="side">

			<p><b><a href="index.php" data-hover="Home">主页</a></b></p>
			<p><b><a href="syllabus.html">课程表 </a></b></p>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">通知<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="event.html#school">学校通知</a></li>
					<li><a href="event.html#class">课堂通知</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">提交<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="submit.html#assignment">提交作业</a></li>
					<li><a href="submit_exp.html#lab">提交实验</a></li>
				</ul>
			</li>
		</div>





		<div class="login_cont">
		<div class="login_nav">
			<div class="nav_slider">
				<a href="#" class="signup focus">注册</a>
				<a href="#" class="signin">登录</a>
			</div>
		</div>
		<form>
			<div class="input_signup active">
				<input class="input" id="user_name" type="text" aria-label="用户名（包含字母／数字／下划线" placeholder="用户名">
				<div class="hint">请填写符合格式的用户名</div>
				<input class="input" id="user_email" type="text" aria-label="邮箱" placeholder="邮箱">
				<div class="hint">请填写邮箱</div>
				<input class="input" id="phone" type="text" class="account" aria-label="手机号（仅支持中国大陆）" placeholder="手机号（仅支持中国大陆）">
				<div class="hint">请填写手机号</div>
				<input class="input" id="password" type="password" aria-label="密码" placeholder="密码（不少于 6 位）">
				<div class="hint">请填写符合格式的密码</div>
				<input class="input" id="repassword" type="password" aria-label="密码" placeholder="再次输入密码">
				<div class="hint">请再次输入密码</div>
				<input type="submit" id="submit" class="button" name="button" value="注册">
			</div>
		</form>
		<form>
			<div class="input_signin">
				<input class="input" id="login_user_name" type="text" aria-label="用户名" placeholder="用户名">
				<div class="hint">请输入用户名</div>
				<input class="input" id="login_password" type="password" aria-label="密码" placeholder="密码">
				<div class="hint">请输入密码</div>
				<input type="submit" id="button" class="button" name="button" value="登录">
				<div class="forget">
					<a href="forget.html">忘记密码？</a>
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/form.js"></script>
	<script type="text/javascript" src="js/config.js"></script>
	<script type="text/javascript" src="js/login_ajax.js"></script>


</body>
<!-- //Body -->

</html>
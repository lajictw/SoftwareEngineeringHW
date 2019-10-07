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

	<!-- default css files -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- default css files -->

	<!--web font-->
	<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!--//web font-->


	<!-- Body -->

<body>
	<!-- banner -->
	<div class="banner1">
		<div class="header-top">
			<div class="container">
				<div class="header-top-right">
					<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:example@example.com">example@hust.edu.cn</a></p>
					<?php
					if (isset($_SESSION['username'])) {
						$name = $_SESSION['username'];
						if($_SESSION['isTeacher'])
							 echo "<p>欢迎,$name 老师</p>";
						else
							echo "<p>欢迎,$name 同学</p>";
					}
					?>
				</div>
			</div>
		</div>
		<div class="head">
			<div class="container">
				<div class="navbar-top">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand logo ">
							<h1 class="animated wow pulse" data-wow-delay=".5s">
								<a href="index.php">华中科技大学网络课堂系统</a></h1>
						</div>

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav link-effect-4">
							<li><a href="index.php" data-hover="Home">主页</a> </li>
							<li><a href="syllabus.html">课程表 </a> </li>
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
							<!-- <li ><a href="index.html" >退出登录</a> </li> -->
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<h2>注册或登录</h2>
	</div>
	<!-- //banner -->
	<div class="sideleft">
		<div class="index">
			<form action="logic/signup.php" method="post">
				<p class="astyle">用户名：</p>
				<input type=text name="name">
				<p class="astyle">密码：</p>
				<input type=password name="password">
				<input type="submit" value="注册" name="submit">
			</form>

		</div>

	</div>
	<div class="sideright">
		<div class="index">
			<form name="login" action="logic/login.php" method="post">
				<p class="astyle">用户名：</p>
				<input type=text name="name">
				<p class="astyle">密码：</p>
				<input type=password name="password">
				<input type="submit" value="登陆" name="submit">
			</form>
		</div>
	</div>

	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- //Default-JavaScript-File -->


</body>
<!-- //Body -->

</html>
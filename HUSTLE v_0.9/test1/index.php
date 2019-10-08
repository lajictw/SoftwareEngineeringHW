<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>HUSTLE</title>
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



</head>

<!-- Body -->

<body>

	<!-- banner -->
	<div class="banner">
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
							<li class="active"><a href="index.php" data-hover="Home">主页</a> </li>
							<li><a href="syllabus.php">课程表 </a> </li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">通知<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="event.php#school">学校通知</a></li>
									<li><a href="event.php#class">课堂通知</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">提交<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="submit.php#assignment">提交作业</a></li>
									<li><a href="submit_exp.php#lab">提交实验</a></li>
								</ul>
							</li>
							<?php
							if (isset($_SESSION['username'])) {
								echo '<li><a href="quit.php">退出登录</a> </li>';
							} else {
								echo '<li ><a href="welcome.php" >登录/注册</a> </li>';
							}
							?>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="bannerinfo">
			<div class="container">
				<div class="col-md-5 bannergrid">
					<div class="top">
						<h5>Huazhong University of Science and Technology</h5>
						<h2>Lecture Enhancement</h2>
					</div>
					<div class="bottom">
						<div class="col-md-6 bannergrid1 clr">
							<h4><a href="attendance+.php" style="color: white">签到 🙋‍🙋‍♂️</a></h4>
							<div class="clearfix"></div>
							<p>选择课堂</p>
							<p>参加课堂签到</p>
						</div>
						<div class="col-md-6 bannergrid1 clr1">
							<h4><a href="course.php" style="color: white">课程中心 📚</a></h4>
							<div class="clearfix"></div>
							<ul>
								<p>布告板</p>
								<p>成绩查询</p>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-6 bannergrid1 clr2">
							<h4><a href="quiz.php" style="color: white">Quiz ✏️</a></h4>
							<div class="clearfix"></div>
							<p>进入课堂小测</p>
							<p>参加讨论</p>

						</div>
						<div class="col-md-6 bannergrid1 clr3">
							<h4><a href="setting.php" style="color: white">设置 🔧</a></h4>
							<div class="clearfix"></div>
							<p>设置课堂信息</p>
							<p>设置账号信息</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>

	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- //Default-JavaScript-File -->

</body>

	</html>
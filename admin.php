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
	<link href="css/style_welcome.css" rel="stylesheet" type="text/css" />
	<!--component-css-->
	<script src="travel/js/jquery-2.1.4.min.js"></script>
	<script src="travel/js/bootstrap.min.js"></script>
	<!--script-->
	<script src="travel/js/modernizr.custom.js"></script>
	<script src="travel/js/bigSlide.js"></script>
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
					<div class="Profile-right" >
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
				<div class="details-grid">
					<div class="details-shade">
					</div>
				</div>
<!-- buttons -->
				<div class="w3agile banner-bottom">
				<ul>
				    <li><a href="upload.php" class="hvr-radial-out"><i class="fa fa-upload" aria-hidden="true"></i></a><h6>上传作文</h6></li>
					<li><a href="excellent.php" class="hvr-radial-out"><i class="fa fa-star" aria-hidden="true"></i></a><h6>优秀作文</h6></li>
					<li><a href="mydiarys.php" class="hvr-radial-out"><i class="fa fa-list" aria-hidden="true"></i></a><h6>我的作文</h6></li>
					<li><a href="change.php" class="hvr-radial-out"><i class="fa fa-user" aria-hidden="true"></i></a><h6>修改资料</h6></li>
				</ul>
			</div>
			</div>
		</div>
</body>
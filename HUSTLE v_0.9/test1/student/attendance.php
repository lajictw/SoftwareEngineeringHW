<?php
include('../logic/connect.php'); //链接数据库
header("content-type: text/html; charset=utf8");
session_start();
$userid = $_SESSION['id'];
$days = array("Null", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
$times = array("Null", "section:1-2", "section:2-3", "section:3-4", "section:5-6", "section:7-8");
$sql = "select * from info where user_id = $userid and first_attendance = 1 or user_id = $userid and second_attendance =1";
$result = mysqli_query($con, $sql); //执行sql
$rows = mysqli_num_rows($result); //返回一个数值
$row = mysqli_fetch_assoc($result);
	if ($rows) {
		$first = $row['first_attendance'];
		$_SESSION['course'] = $row['course_id'];
		$_SESSION['isFirst'] = $first;
		$second = $row['second_attendance'];
		$_SESSION['isSecond'] = $second;
		$course =  $row['course_id'];
		$newSql = "select * from course where id = $course";
		$newResult = mysqli_query($con, $newSql); //执行sql
		$newRows = mysqli_num_rows($newResult); //返回一个数值
		$newRow = mysqli_fetch_assoc($newResult);
		if ($newRows) {
			$course_name = $newRow['name'];
			$firstclass = $newRow['first'];
			$secondclass = $newRow['second'];
			$time = $newRow['time'];
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
	<title>About</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf8">
	<meta name="keywords" content="" />

	<!-- default css files -->
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/font-awesome.min.css" />
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
		<?php
		if (isset($_SESSION['username'])){
			if($first)
				echo "<h2>'$course_name'课请签到:$days[$firstclass],$times[$time]</h2>";
			else if($second)
				echo "<h2>'$course_name'课请签到:$days[$secondclass],$times[$time]</h2>";
			else
				echo "<h2>签到已完成</h2>";
		} 
		?>
	</div>
	<!-- //banner -->
	    
	<?php
		if($first||$second)
			echo'
			<form action="../logic/confirm_attendance.php" method="post">
			<input type="submit" name="sub_btn" value="签到">
			';
	?>
		<!-- Default-JavaScript-File -->
		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
		<!-- //Default-JavaScript-File -->


</body>
<!-- //Body -->

</html>
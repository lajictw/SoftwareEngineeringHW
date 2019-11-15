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
	<!-- custom css -->
	<link href="css/mydiarys.css" rel="stylesheet" type="text/css">
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
					<div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
				<!-- banner -->
	<div id="floater">
        <div id="content">
            <div id="mid-content" >
                    <?php
include "./logic/connect.php";
$userid = $_SESSION['userid'];
$sql = "SELECT * from excellent";
$result = mysqli_query($con, $sql);
$rows = mysqli_num_rows($result);
if ($rows == 0) {
    echo ("<h5 class='info'>当前没有优秀微日记！</h5>");
} else {
    echo ("<h5 class='info'>老师一共展示了{$rows}篇优秀微日记。</h5>");
}
echo("<div class='DiaryList'><ul>");

while($row = mysqli_fetch_array($result))
	{
		$id=$row['id'];
		$tempsql="SELECT * FROM files where id=$id";
		$tempresult = mysqli_query($con, $tempsql);
		$temprows = mysqli_num_rows($tempresult);
		if($temprows>0)
		$temprow = mysqli_fetch_array($tempresult);
		{
			$fname=$temprow['fname'];
			$score=$temprow['score'];
			echo("<li><a href='./display.php?id=$id'>$fname</a>");
			echo
		"<div style='float:right'>";
		if($score==0)
		echo("<a style='color:black;text-decoration:none'>未评分</a>");
		else echo("<a style='color:black;text-decoration:none'>{$score}分</a>");
		echo("</div></li>");}
	}
echo("</ul></div>");
?>
                <ul>
                </ul>
            </div>
        </div>
    </div>
</body>
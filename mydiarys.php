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
	<!-- custom css -->
	<link href="css/mydiarys.css" rel="stylesheet" type="text/css">
	<!--component-css-->
	<script src="travel/js/jquery-2.1.4.min.js"></script>
	<script src="travel/js/bootstrap.min.js"></script>
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
					<div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div id="floater">
        <div id="content">
            <div id="mid-content" >
                    <?php
include "./logic/connect.php";//连接数据库
$userid = $_SESSION['userid'];//获取用户id
$sql = "SELECT * from files WHERE userid =$userid";//设置查询语句
$result = mysqli_query($con, $sql);//从数据库中该用户的所有作文
$rows = mysqli_num_rows($result);//获取作文总数
if ($rows == 0) //没有已经上传的作文
{
    echo ("<h5 class='info'>你当前没有已上传的微日记！</h5>");
    echo("<div class='w3agile banner-bottom' style='background:white'>
    <ul>
        <li><a href='upload.php' class='hvr-radial-out'><i class='fa fa-upload' aria-hidden='true'></i></a><h6>立即上传!</h6></li>
    </ul>");//显示立即上传按钮,链接到upload.php
} else {
    echo ("<h5 class='info'>你一共上传了{$rows}篇微日记。</h5>");//显示上传的作文总数
}
echo("<div class='DiaryList'><ul>");//设置HTML标签
while($row = mysqli_fetch_array($result))//每次获取一个数组
	{
		$fname=$row['fname'];//获取作文标题
		$id=$row['id'];//获取作文id
		echo("<li><a href='./display.php?id=$id'>$fname</a></li>");//显示链接,通过GET方法调用display.php
	}
echo("</ul></div>");//关闭标签
?>
                <ul>
                </ul>
            </div>
        </div>
    </div>
</body>
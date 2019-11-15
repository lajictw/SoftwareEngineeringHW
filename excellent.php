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
	<!--script-->
	<script src="travel/js/modernizr.custom.js"></script>
	<script src="travel/js/bigSlide.js"></script>
	<title>欢迎使用微日记</title>
</head>
<!-- banner -->
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
$userid = $_SESSION['userid'];//获取session中的用户id
$sql = "SELECT * from excellent";//设置sql语句
$result = mysqli_query($con, $sql);//查询所有优秀作文
$rows = mysqli_num_rows($result);//获取优秀作文数目
if ($rows == 0) //没有优秀作文
{
    echo ("<h5 class='info'>当前没有优秀微日记！</h5>");
} 
else 
{
    echo ("<h5 class='info'>老师一共展示了{$rows}篇优秀微日记。</h5>");
}
echo("<div class='DiaryList'><ul>");//设置HTML标签
while($row = mysqli_fetch_array($result))//每次获取一个数组
	{
		$id=$row['id'];//获取该作文的id
		$tempsql="SELECT * FROM files where id=$id";//设置查询语句
		$tempresult = mysqli_query($con, $tempsql);//从数据库中查找该作文
		$temprows = mysqli_num_rows($tempresult);//获取查找到的作文
		if($temprows>0)//如果找到了
		$temprow = mysqli_fetch_array($tempresult);//获取该作文信息
		{
			$fname=$temprow['fname'];//获取作文名称
			$score=$temprow['score'];//获取分数
			echo("<li><a href='./display.php?id=$id'>$fname</a>");//显示作文名称,设置超链接以GET方法调用display.php
			echo
		"<div style='float:right'>";//设置style
		if($score==0)//未评分
		echo("<a style='color:black;text-decoration:none'>未评分</a>");
		else echo("<a style='color:black;text-decoration:none'>{$score}分</a>");//已评分
		echo("</div></li>");}//设置结束HTML标签
	}
echo("</ul></div>");//设置结束HTML标签
?>
                <ul>
                </ul>
            </div>
        </div>
    </div>
</body>
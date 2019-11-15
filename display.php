<?php
session_start();//启用php的session功能
$id=$_GET['id'];//使用GET获取文章的id号
include("./logic/connect.php");//连接数据库
$sql="SELECT * FROM files where id=$id";//查询该id的作文
$result=mysqli_query($con,$sql);//进行查询
$row = mysqli_fetch_array($result);//获取查询结果
$filename=$row['fname'];//获取作文名称
$txtpath=$row['ftxtpath'];//获取作文路径
/**
     * 展示作文
     * @param  string $filename  需要展示的文件路径
     */
 function showDiary($filename ='')
{
    $file=fopen($filename,"r") or die("Open Error!");//打开该文件,并完成了异常处理
	while(!feof($file))//读取所有文件内容
	{
		echo fgets($file)."<br>";//为读取的文本添加HTML换行符
	}
	fclose($file);//关闭文件
}
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
	<link href="css/display.css" rel="stylesheet" type="text/css">
	<!--component-css-->
	<script src="travel/js/jquery-2.1.4.min.js"></script>
	<script src="travel/js/bootstrap.min.js"></script>
	<title>
	<?php
	echo($filename);//显示作文标题作为网页标题
	?></title>
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
					showDiary($txtpath);//调用函数,显示作文内容
				?>
			</div>
		</div>
	</div>
</body>

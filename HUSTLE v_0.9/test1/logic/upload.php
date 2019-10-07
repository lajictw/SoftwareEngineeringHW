<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php'); //链接数据库
session_start();
$allowedExts = array("zip", "docx","pdf", "doc","md");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
$id = $_SESSION['id'];
$class =  $_REQUEST["class"];
if (in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
        $tmp_name = $_FILES["file"]['tmp_name'];
        $size = $_FILES["file"]['size'];
        $name = $_FILES["file"]['name'];
        $type = $_FILES["file"]['type'];
        $fp = fopen($tmp_name, 'r');
        $content = fread($fp, $size);
        fclose($fp);
        $content = addslashes($content);
        $sql = "INSERT INTO updfiles(user_id,course_id,name, type, size,content) VALUES ($id,$class,'$name','$type',$size,'$content')";;
        mysqli_query($con,$sql);
        header("refresh:0;url=../student/index.php");
        echo"<script>alert('已提交！')</script>";
    }
}		
?>

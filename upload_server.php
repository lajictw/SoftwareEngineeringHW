<!DOCTYPE html>
<html lang="zh-CN">
<!-- Head -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<head>
	<title>上传文件</title>
</head>
<?php
include "logic/connect.php";
session_start();
header("content-type:text/html;charset=utf-8");
//设置时区
date_default_timezone_set('PRC');
//获取文件名
$filename = $_FILES['file']['name'];
//获取文件临时路径
$temp_name = $_FILES['file']['tmp_name'];
//获取大小
$size = $_FILES['file']['size'];
//获取文件上传码，0代表文件上传成功
$error = $_FILES['file']['error'];
//判断文件大小是否超过设置的最大上传限制
if ($size > 4 * 1024 * 1024) {
    //
    echo "<script>alert('文件大小超过4M大小');window.history.go(-1);</script>";
    exit();
}
//phpinfo函数会以数组的形式返回关于文件路径的信息
//[dirname]:目录路径[basename]:文件名[extension]:文件后缀名[filename]:不包含后缀的文件名
$arr = pathinfo($filename);
//获取文件的后缀名
$originname=$arr['filename'];
$ext_suffix = $arr['extension'];
//设置允许上传文件的后缀
$allow_suffix = array('doc', 'docx', 'txt', 'pdf');
//判断上传的文件是否在允许的范围内（后缀）==>白名单判断
if (!in_array($ext_suffix, $allow_suffix)) {
    // window.history.go(-1)表示返回上一页并刷新页面
    echo "<script>alert('上传的文件类型只能是doc、docx、txt、pdf');window.history.go(-1);</script>";
    exit();
}
//检测存放上传文件的路径是否存在，如果不存在则新建目录
if (!file_exists('uploads')) {
    mkdir('uploads');
}
//为上传的文件新起一个名字，保证更加安全
$true_filename = date('YmdHis', time()) . rand(100, 1000);
$new_filename = $true_filename . '.' . $ext_suffix;
if (move_uploaded_file($temp_name, 'uploads/' . $new_filename)) {
    echo "<script>alert('文件上传成功!');</script>";
    header("refresh:0;url=../welcome.php");
} else {
    echo "<script>alert('文件上传失败?');</script>";
    header("refresh:0;url=../upload.php");
    exit();
}
if (isset($_SESSION['userid'])) 
{
    $userid = $_SESSION['userid'];
}
else
{
    $userid = 0;
}
    // $sql = "INSERT INTO files (fname, fpath,userid)
    // 	VALUES ('$filename','uploads/$new_filename',$userid)";
    // mysqli_query($con, $sql);
    include "./doc2txt.php";
    $insertname = "uploads/".$true_filename . ".txt";
    $newdoc = "C:/Users/Zayle/WeDiary/uploads/" . $new_filename;
    $newtxt = "C:/Users/Zayle/WeDiary/uploads/" . $true_filename . ".pdf";
        if ($ext_suffix != 'txt') 
        {
            if ($ext_suffix != 'pdf') 
            {
        		$conv = new Convert;
                $conv->run($newdoc, $newtxt);
            
                if(file_exists($insertname))
                {
                    unlink($newdoc);
                }
                else 
                {
                    echo("<script>alert('该文件可能已损坏！')</script>");
                    header("refresh:0;url=../upload.php");
                    exit();
                }
            }
        	else
        	{
                echo("$newdoc"."<br>");
                exec("pdftotext $newdoc");
                if(!file_exists($insertname))
                {
                    echo("<script>alert('该文件可能已损坏！')</script>");
                    header("refresh:0;url=../upload.php");
                    exit();
                }
        	}
            
        }
        $sql = "INSERT INTO files(id,fname,fpath,ftxtpath,userid)
            VALUES (null,'$originname','uploads/$new_filename','$insertname',$userid)";
            // echo("$sql<br>");
            if (!$con->query($sql)) {
                die("Insert Error!");
        }

$con->close();

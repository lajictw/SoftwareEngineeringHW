<?php
session_start();//启用php的session功能
header("content-type:text/html;charset=utf-8");//设置HTML头部
date_default_timezone_set('PRC');//设置时区
if (!file_exists('uploads')) {//检查是否存在uploads文件夹
    mkdir('uploads');//不存在则新建一个
}
include("./logic/connect.php");//连接数据库
if(!isset($_POST['title']))//没有作文标题
{
    echo "<script>window.history.go(-1)</script>";//返回上一页
}
$title=$_POST['title'];//获取作文标题
$userid=$_POST['userid'];//获取用户id
$text=$_POST['text'];//获取作文文本
$true_filename = date('YmdHis', time()) . rand(100, 1000).".txt";//生成随机数,覆盖旧有文件名
$file=fopen("uploads/$true_filename","w");//建立文件
fwrite($file,$text);//将获取到的作文文本写入新文件
$originname=$title;
$sql = "INSERT INTO files(id,fname,fpath,ftxtpath,title,userid,score)
            VALUES (null,'$originname','uploads/$true_filename','uploads/$true_filename','$title',$userid,0)";//设置sql查询语句
if (!$con->query($sql)) //向数据库内插入新文件信息
{
    die("Insert Error!");//异常处理
}
header("refresh:0;url='./mydiarys.php'");//刷新页面,重定向至mydiarys.php
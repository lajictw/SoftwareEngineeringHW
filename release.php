<?php
session_start();
header("content-type:text/html;charset=utf-8");
//设置时区
date_default_timezone_set('PRC');
if (!file_exists('uploads')) {
    mkdir('uploads');
}
include("./logic/connect.php");
if(!isset($_POST['title']))
{
    echo "<script>window.history.go(-1)</script>";
}
$title=$_POST['title'];
$userid=$_POST['userid'];
$text=$_POST['text'];
// echo $title;
$true_filename = date('YmdHis', time()) . rand(100, 1000).".txt";
$file=fopen("uploads/$true_filename","w");
fwrite($file,$text);
$originname=$title;
$sql = "INSERT INTO files(id,fname,fpath,ftxtpath,title,userid,score)
            VALUES (null,'$originname','uploads/$true_filename','uploads/$true_filename','$title',$userid,0)";
if (!$con->query($sql)) 
{
    die("Insert Error!");
}

header("refresh:0;url='./mydiarys.php'");
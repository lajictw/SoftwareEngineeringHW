<?php
//本部分程序用于给作文打分
include("./logic/connect.php");
session_start();
$score=$_POST['score'];
if($score==0)//倘若不对打分条做任何动作，则显示未评分状态
    {echo("<script>alert('未评分!');window.history.go(-1);</script>");
    exit();}
$id=$_POST['id'];
$sql="UPDATE files SET score=$score where id=$id";//更新作文评分
mysqli_query($con,$sql);
$sql="SELECT * FROM files WHERE id=$id";
$result=mysqli_query($con,$sql);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
//获取作文相关信息
$fname=$row['fname'];
$ftxtpath=$row['ftxtpath'];
$fpath=$row['fpath'];
$userid=$row['userid'];
$sql="SELECT * FROM users WHERE id=$userid";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$username=$row['username'];
echo"<script>alert('你给{$username}同学的作文{$fname}的打分为{$score}!');window.history.go(-1);</script>";

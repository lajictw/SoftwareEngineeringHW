<?php
header("Content-Type: text/html; charset=utf8");
session_start();
if (!isset($_POST["submit"])) {
    exit("无权限调用！");
} //检测是否有submit操作
include("./connect.php");
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
$sql = "select * from users where id = $userid";
$result = mysqli_query($con, $sql);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
//对于越权操作的控制
if ($rows <= 0) {
    echo "<script>alert('请先登录！')</script>";
    header("refresh:0;url=./index.php");
    mysqli_close($con);
}
//忘记密码的处理
$newname = $_POST['name']; //post获取表单里的name
$newpassword = $_POST['password']; //post获取表单里的password
$newemail = $_POST['email'];
$sql="UPDATE users SET username ='$newname' where id = $userid";
mysqli_query($con,$sql);
$sql="UPDATE users SET password ='$newpassword' where id = $userid";
mysqli_query($con,$sql);
$sql="UPDATE users SET email ='$newemail' where id = $userid";
mysqli_query($con,$sql);
mysqli_close($con);
$_SESSION['username']=$newname;
echo("<script>alert('修改成功！')</script>");
header("refresh:0;url=../welcome.php");

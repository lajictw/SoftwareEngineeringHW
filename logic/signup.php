<?php
header("Content-Type: text/html; charset=utf8");

if (!isset($_POST['submit'])) {
    exit("无权限调用！");
} //判断是否有submit操作
$name = $_POST['name']; //post获取表单里的name
$password = $_POST['password']; //post获取表单里的password
$email = $_POST['email'];
include('connect.php'); //链接数据库
$sql = "select * from users";
$result = mysqli_query($con, $sql);
$flag=false;
if ($result->num_rows > 0) {
    while ($tempname = $result->fetch_assoc()["username"]) {
        if ($tempname == $name) {
            $flag = true;
            break;
        }
    }
}
if ($flag) {
    // echo "$tempname";
    echo "<script>alert('请勿重复注册！')</script>";
    header("refresh:0;url=../signinorup.php");
    mysqli_close($con);
    exit();
}
$newuser = "insert into users(id,username,password,email) values (null,'$name','$password','$email')"; //向数据库插入表单传来的值的sql
$result = mysqli_query($con, $newuser);

if (!$result) {
    die('Error: ' . $con->error); //如果sql执行失败输出错误
} else {
    session_start();
    $_SESSION['username'] = $name;
    header("refresh:0;url=../signinorup.php");//如果成功跳转至welcome.html页面
    echo "<script>alert('注册成功！')</script>";
}
mysqli_close($con);//关闭数据库

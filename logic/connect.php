<?php
$server = "localhost:3306"; //主机
$db_username = "root"; //你的数据库用户名
$db_password = "nmsl"; //你的数据库密码

$con = mysqli_connect($server, $db_username, $db_password); //链接数据库
if (!$con) {
    die("can't connect" . mysql_error());
}

//如果不存在目标数据库则创建
mysqli_query($con, "CREATE DATABASE IF NOT EXISTS WeDiary");
//选择目标数据库WeDiary
mysqli_select_db($con, "WeDiary");
//如果不存在目标表单则创建，否则选中
$sql = "CREATE TABLE IF NOT EXISTS users(
        id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        usertype INT(3) 
        ) default charset=utf8; ";

//对于数据表创建错误的控制，增强健壮性
if (!$con->query($sql)) {
    die("创建数据表错误: " . $con->error);
}

//如果不存在目标表单则创建，否则选中
$sql = "CREATE TABLE IF NOT EXISTS files(
        id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(50) NOT NULL,
        fpath VARCHAR(50),
        ftxtpath VARCHAR(50),
        userid INT(6)
        ) default charset=utf8; ";
//对于数据表创建错误的控制，增强健壮性
if (!$con->query($sql)) {
    die("创建数据表错误: " . $con->error);
}
//如果不存在目标表单则创建，否则选中
$sql = "CREATE TABLE IF NOT EXISTS excellent(
        id INT(6),
        fname VARCHAR(50) NOT NULL,
        fpath VARCHAR(50),
        ftxtpath VARCHAR(50),
        userid INT(6)
        ) default charset=utf8; ";
//对于数据表创建错误的控制，增强健壮性
if (!$con->query($sql)) {
    die("创建数据表错误: " . $con->error);
}
// $sql = "CREATE TABLE IF NOT EXISTS diarys(
//         id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         fname VARCHAR(30) NOT NULL,
//         userid INT(6)
//         ) default charset=utf8; ";
// if (!$con->query($sql)) {
//     die("创建数据表错误: " . $con->error);
// }
$sql="set names utf8";
$con->query($sql);
?>
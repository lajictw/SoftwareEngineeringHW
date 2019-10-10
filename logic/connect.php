<?php
$server = "localhost:3306"; //主机
$db_username = "root"; //你的数据库用户名
$db_password = "nmsl"; //你的数据库密码

$con = mysqli_connect($server, $db_username, $db_password); //链接数据库
if (!$con) {
    die("can't connect" . mysql_error());
}

mysqli_query($con, "CREATE DATABASE IF NOT EXISTS WeDiary");
mysqli_select_db($con, "WeDiary");
$sql = "CREATE TABLE IF NOT EXISTS users(
        id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL
        )";
if (!$con->query($sql)) {
    die("创建数据表错误: " . $con->error);
}
$sql = "CREATE TABLE IF NOT EXISTS files(
        id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(30) NOT NULL,
        fpath VARCHAR(30),
        userid INT(6)
        )";
if (!$con->query($sql)) {
    die("创建数据表错误: " . $con->error);
}
$sql = "CREATE TABLE IF NOT EXISTS diarys(
        id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(30) NOT NULL,
        userid INT(6)
        )";
if (!$con->query($sql)) {
    die("创建数据表错误: " . $con->error);
}
?>
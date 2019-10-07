<?php
    $server="localhost:3306";//主机
    $db_username="root";//你的数据库用户名
    $db_password="123456";//你的数据库密码

    $con = mysqli_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect".mysql_error());
    }
    mysqli_select_db($con,'usr');
    mysqli_query($con,'set names utf8'); 
?>
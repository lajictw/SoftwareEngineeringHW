<?PHP
header("Content-Type: text/html; charset=utf8");
include('connect.php'); //链接数据库
session_start();
$id = $_SESSION['id'];
 $class =  $_REQUEST["class"];
    $opt = $_REQUEST["msg"];
    echo $opt;
    mysqli_query($con,"INSERT INTO event(id,msg) VALUES ($class,'".$opt."')");
    // header("refresh:0;url=../index.php");

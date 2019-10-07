<?php
session_start();
$name = $_SESSION['username'];
session_destroy();
header("refresh:0;url=index.php"); //如果成功跳转至welcome.html页面
echo "<script>alert('再见, $name')</script>";
    
?>
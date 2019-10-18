
<?php
session_start();
if(isset($_SESSION['userid']))
    unset($_SESSION['userid']);
if(isset($_SESSION['username']))
    unset($_SESSION['username']);
header("refresh:0;url=../index.php");
echo"<script>alert('你已退出登录！')</script>";
//登出账号
?>

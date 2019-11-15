<?php
    include("logic/connect.php");
    session_start();
    $id=$_GET['id'];
    $sql="SELECT * FROM files WHERE id=$id";
    $result=mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    $flag=$_SESSION['excellentFlag'];
    if($rows==0)
    {
       echo("<script>alert('不存在该文章！')</script>");
       header("refresh:0;url=../teacher_Display.php");
       exit();
    }
    $row = mysqli_fetch_array($result);
    $fname=$row['fname'];
    $ftxtpath=$row['ftxtpath'];
    $fpath=$row['fpath'];
    $userid=$row['userid'];

    $sql="SELECT * FROM users WHERE id=$userid";
    $result=mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($rows==0)
    {
       echo("<script>alert('不存在该用户！')</script>");
       header("refresh:0;url=../select.php");
       exit();
    }
    $username=$row['username'];
    if(!$flag)
    {
        $sql="INSERT INTO excellent(id) VALUE ($id)";
        if (!$con->query($sql)) 
            die($con->error);
        echo("<script>alert('已将学生{$username}的微日记《{$fname}》设为精选！')</script>");
    }
    else
    {
        $sql="DELETE FROM excellent where id=$id";
        if (!$con->query($sql)) 
            die($con->error);
        echo("<script>alert('已取消学生{$username}的微日记《{$fname}》的精选！')</script>");
    }


    header("refresh:0;url=../select.php");
    

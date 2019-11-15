<?php
    include("logic/connect.php");
    session_start();
    $id=$_GET['id'];//获取id
    $sql="SELECT * FROM files WHERE id=$id";
    $result=mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    $flag=$_SESSION['excellentFlag'];
    if($rows==0)//对于文章是否存在的判断
    {
       echo("<script>alert('不存在该文章！')</script>");
       header("refresh:0;url=../teacher_Display.php");
       exit();
    }
    //获取文章相关信息
    $row = mysqli_fetch_array($result);
    $fname=$row['fname'];
    $ftxtpath=$row['ftxtpath'];
    $fpath=$row['fpath'];
    $userid=$row['userid'];

    $sql="SELECT * FROM users WHERE id=$userid";
    $result=mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($rows==0)//对于用户是否存在的判断
    {
       echo("<script>alert('不存在该用户！')</script>");
       header("refresh:0;url=../select.php");
       exit();
    }
    $username=$row['username'];
    if(!$flag)//通过flag来标记本次点击为设置成为精选或取消精选
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
    

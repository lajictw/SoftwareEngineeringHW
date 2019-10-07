<?PHP
header("Content-Type: text/html; charset=utf8");
include('connect.php'); //链接数据库
session_start();
$id = $_SESSION['id'];
if(isset($_REQUEST["change"])){
    $class =  $_REQUEST["change"];
    if(isset($_REQUEST["firstclass"])){
        $opt = $_REQUEST["firstclass"];
        
        mysqli_query($con,"UPDATE course SET first = $opt WHERE id = $class");
    }
    if(isset($_REQUEST["secondclass"])){
        $opt = $_REQUEST["secondclass"];
        
        mysqli_query($con,"UPDATE course SET second = $opt WHERE id = $class");
    }
    if(isset($_REQUEST["section"])){
        $opt = $_REQUEST["section"];
        
        mysqli_query($con,"UPDATE course SET time = $opt WHERE id = $class");
    }
}

if(isset($_REQUEST["add"])){
    $class =  $_REQUEST["add"];
    if(isset($_REQUEST["name"])&&isset($_REQUEST["newclass1"])&&isset($_REQUEST["newsection"])&&isset($_REQUEST["newclass2"])){
        $opt1 = $_REQUEST["newclass1"];
        $opt2 = $_REQUEST["newclass2"];
        $opt3 = $_REQUEST["newsection"];
        $opt3 = $opt3*2 -1;
        $opt4 = $_REQUEST["name"];
        mysqli_query($con,"INSERT INTO course(id,name,first,second,time) VALUES ($class,'".$opt4."',$opt1,$opt2,$opt3)");
        mysqli_query($con,"INSERT INTO info(user_id,course_id,isTeacher) VALUES($id,$class,1)");
    }
    
}
header("refresh:0;url=../index.php");
echo"<script>alert('已完成更改！')</script>";
?>
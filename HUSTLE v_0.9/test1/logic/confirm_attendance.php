<?PHP
header("Content-Type: text/html; charset=utf8");
include('connect.php'); //链接数据库
session_start();
$userid = $_SESSION['id'];
$id = $_SESSION['course'];
$first = $_SESSION['isFirst'];
$second= $_SESSION['isSecond'];
include('connect.php');//链接数据库
	if($first){
        mysqli_query($con,"UPDATE info SET first_attendance = 0 WHERE course_id = $id AND user_id = $userid");
        mysqli_query($con,"UPDATE info SET first_attendance = first_attendance+1 WHERE course_id = $id AND isTeacher = 1");
    }
    else if($second){
        mysqli_query($con,"UPDATE info SET second_attendance = 0 WHERE course_id = $id AND user_id = $userid");
        mysqli_query($con,"UPDATE info SET first_attendance = second_attendance+1 WHERE course_id = $id AND isTeacher = 1");
    }
    
    $_SESSION['attendance'] = 1;
    header("refresh:0;url=../student/index.php");
    echo"<script>alert('已签到！')</script>";
?>
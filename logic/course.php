<?PHP
header("Content-Type: text/html; charset=utf8");
include('connect.php'); //链接数据库
session_start();
$id = $_SESSION['id'];
if(isset($_REQUEST["quit"])){
    $class=$_REQUEST["quit"]+1;
    mysqli_query($con,"DELETE FROM info WHERE user_id = $id AND course_id = $class");
    mysqli_query($con,"UPDATE info SET total = total-1 WHERE course_id = $class AND isTeacher = 1");
    header("refresh:0;url=../student/course.php");
    echo"<script>alert('退选成功！')</script>";    
}
if(isset($_REQUEST["attend"])){
    $class=$_REQUEST["attend"]+1;
    mysqli_query($con,"INSERT INTO info(user_id,course_id) VALUES ($id,$class)");
    mysqli_query($con,"UPDATE info SET total = total+1 WHERE course_id = $class AND isTeacher = 1");
    header("refresh:0;url=../student/course.php");
    echo"<script>alert('选修成功！')</script>";    
}
?>
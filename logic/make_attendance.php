<?PHP
header("Content-Type: text/html; charset=utf8");
include('connect.php'); //链接数据库
session_start();
$userid = $_SESSION['id'];
if(isset($_REQUEST["sub_btn"])){
    $opt=$_REQUEST["operate"];
    if($opt[1]){
        $opt -= 0.5;
        $opt = (int)$opt;
        mysqli_query($con,"UPDATE info SET second_attendance = 1 WHERE course_id = $opt");
        mysqli_query($con,"UPDATE info SET second_attendance = 0 WHERE course_id = $opt AND isTeacher = 1");
        $_SESSION['attend_class'] = $opt+0.5;
    }
    else{
    mysqli_query($con,"UPDATE info SET first_attendance = 1 WHERE course_id = $opt");
    mysqli_query($con,"UPDATE info SET first_attendance = 0 WHERE course_id = $opt AND isTeacher = 1");
    $_SESSION['attend_class'] = $opt;
    }
    $_SESSION['attendance'] = 1;
    header("refresh:0;url=../index.php");
    echo"<script>alert('已开始签到！')</script>";
}
?>

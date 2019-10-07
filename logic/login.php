<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }//检测是否有submit操作 
    include('connect.php');//链接数据库
    $name = $_POST['name'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值


    if ($name && $passowrd){//如果用户名和密码都不为空
             $sql = "select * from user where username = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
             $result = mysqli_query($con,$sql);//执行sql
             $rows=mysqli_num_rows($result);//返回一个数值
             $row=mysqli_fetch_assoc($result);
             if($rows){//0 false 1 true
                   session_start();
                   $_SESSION['username']=$name;
                   $isTeacher = $row['isTeacher'];
                   $id = $row['id'];
                   $_SESSION['isTeacher']=$isTeacher;
                   $_SESSION['id']=$id;
                   if($isTeacher)
                        header("refresh:0;url=../index.php");//如果成功跳转至welcome.html页面
                    else
                        header("refresh:0;url=../student/index.php");//如果成功跳转至welcome.html页面
                   if($isTeacher)
                        echo"<script>alert('欢迎, $name 老师')</script>";
                   else
                        echo "<script>alert('欢迎, $name 同学')</script>";
                   exit;
             }else{
                echo "<script>alert('用户名或密码错误！')</script>";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='../welcome.php';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }
             

    }else{//如果用户名或密码有空
                echo "<script>alert('用户名或密码不能为空！')</script>";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='../welcome.php';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
    }

    mysqli_close($conn);
?>
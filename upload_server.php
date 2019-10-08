<?php 
	
	// 上传表单尝试1/1
	$servername = "localhost";
	$username = "root";
	$password = "ctw94nb";
	$dbname = "mydb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
    	die("连接失败: " . $conn->connect_error);
	} 
	// 创建数据库
	// $sql = "CREATE DATABASE myDB";

 

	
	header("content-type:text/html;charset=utf-8");
	//设置时区
	date_default_timezone_set('PRC');
	//获取文件名
	$filename = $_FILES['file']['name'];
	//获取文件临时路径
	$temp_name = $_FILES['file']['tmp_name'];
	//获取大小
	$size = $_FILES['file']['size'];
	//获取文件上传码，0代表文件上传成功
	$error = $_FILES['file']['error'];
	//判断文件大小是否超过设置的最大上传限制
	if ($size > 2*1024*1024){
		//
		// echo "<script>alert('文件大小超过2M大小');window.history.go(-1);</script>";
		exit();
	}
	//phpinfo函数会以数组的形式返回关于文件路径的信息 
	//[dirname]:目录路径[basename]:文件名[extension]:文件后缀名[filename]:不包含后缀的文件名
	$arr = pathinfo($filename);
	//获取文件的后缀名
	$ext_suffix = $arr['extension'];
	//设置允许上传文件的后缀
	$allow_suffix = array('jpg','gif','jpeg','png');
	//判断上传的文件是否在允许的范围内（后缀）==>白名单判断
	if(!in_array($ext_suffix, $allow_suffix)){
		//window.history.go(-1)表示返回上一页并刷新页面
		// echo "<script>alert('上传的文件类型只能是jpg,gif,jpeg,png');window.history.go(-1);</script>";
		exit();
	}
	//检测存放上传文件的路径是否存在，如果不存在则新建目录
	if (!file_exists('uploads')){
		mkdir('uploads');
	}
	//为上传的文件新起一个名字，保证更加安全
	$true_filename=date('YmdHis',time()).rand(100,1000);
	$new_filename = $true_filename.'.'.$ext_suffix;
	echo $new_filename;
	//将文件从临时路径移动到磁盘
	if (move_uploaded_file($temp_name, 'uploads/'.$new_filename)){
		// echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
	}else{
		// echo "<script>alert('文件上传失败,错误码：$error');</script>";
	}
	echo "$ext_suffix";
	$sql = "INSERT INTO MyDoc (fname, fpath)
	VALUES ('$new_filename','uploads/$new_filename')";
	echo $sql;
	mysqli_query($conn,$sql);
	// if ($conn->query($sql) === TRUE) {
    // // echo "新记录插入成功";
	// } else {
    // // echo "Error: " . $sql . "<br>" . $conn->error;
	// }
	$conn->close();
 ?>
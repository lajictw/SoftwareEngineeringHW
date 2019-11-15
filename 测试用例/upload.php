<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<!-- Head -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<meta charset utf="8">

<head>
    <!--font-awsome-css-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--custom css-->
    <link href="css/upload.css" rel="stylesheet" type="text/css" />
    <!--component-css-->
    <script src="travel/js/jquery-2.1.4.min.js"></script>
    <script src="travel/js/bootstrap.min.js"></script>
    <!--script-->
    <script src="travel/js/modernizr.custom.js"></script>
    <script src="travel/js/bigSlide.js"></script>
    <!-- <script src="js/uploadtrick.js"></script> -->
    <script>
        $(document).ready(function() {
            $('.menu-link').bigSlide();
        });
    </script>
    <!-- web-fonts -->
    <link href='http://fonts.useso.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //web-fonts -->
    <title>作文上传</title>
</head>

<body>
    <div class="body-back">
        <div class="masthead pdng-stn1">
            <div class="phone-box wrap push" id="home">
                <div class="menu-notify">
                    <div class="Profile-mid">
                        <h5 class="pro-link"><a href="welcome.php">微日记</a></h5>
                    </div>
                    <div class="Profile-right">
                    <?php
						if (isset($_SESSION['username'])) 
						{
							$name = $_SESSION['username'];
							
						}
						else
						$name = '游客';
						// echo("<div style='border-right: 2% height: 100%;'>");
						if(isset($_SESSION['username']))
						echo("<a style='float:right' href='./logic/logout.php' class='logout'> 
						<i class='fa fa-sign-out'></i></a>");
						echo "<a style='float:right'>$name , 你好！</a>";
						// echo("</div>");
						?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="w3agile banner-bottom">
                    <ul>
                        <!-- <style>button#uploadBtn{border: none;box-shadow: 0;}</style> -->
                        <li id="editNow"><a href="edit.php" class="hvr-radial-out"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <h6>网页编辑</h6>
                        </li>
                        <li><button id="uploadBtn" style="border:none;background:none;display:block;outline:none"><a class="hvr-radial-out"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a></button>
                            <h6 id="uploadText">上传文件</h6>
                        </li>
                        <li style="display:none" id="uponUpload"><button id="submitBtn" style="border:none;outline:none;background:none;display:block"><a class="hvr-radial-out"><i class="fa fa-upload" aria-hidden="true"></i></a></button>
                            <h6>立即上传</h6>
                        </li>
                    </ul>
                    <a id="showFilename" style="display:none" >目前没有选中的文件</a>
                    <form action="upload_server.php" method="post" enctype="multipart/form-data" style="display:none">
                        <input type="hidden" name="max_file_size" value="4194304">
                        <input type="file" name="file" id="uploadInput" accept=".txt,.doc,.docx,.pdf" onchange="rename(this)">
                        <input type="submit" name="上传" id="uploadSubmit">
                        <script>
                            $("#uploadBtn").click(
                                function() {
                                    $("#uploadInput").click();
                                }
                            );

                            function rename(o) {
                                // alert('test');
                                // var tempname = o[0].value;
                                var fileobj = o.files[0];
                                if (typeof(fileobj) == "undefined") {
                                    alert("请选择要上传的文件。");
                                    return false;
                                } else {
                                    var fileName = fileobj.name;
                                    document.getElementById("showFilename").innerHTML = fileName;
                                    document.getElementById("showFilename").style.display="inline-block";
                                    document.getElementById("uponUpload").style.display="inline-block";
                                    document.getElementById("editNow").style.display="none";
                                    document.getElementById("uploadText").innerHTML="重新选择"
                                }
                            }
                            $("#submitBtn").click(
                                function() {
                                    $("#uploadSubmit").click();
                                }
                            );
                        </script>
                    </form>
                </div>
                <!-- banner -->
            </div>
        </div>
</body>
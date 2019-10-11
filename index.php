<?php
session_start();
// if(!isset($_SESSION['usertype']))
// $_SESSION['usertype']=1;
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
	<link href="css/style_index.css" rel="stylesheet" type="text/css" />
	<!--component-css-->
	<script src="travel/js/jquery-2.1.4.min.js"></script>
	<script src="travel/js/bootstrap.min.js"></script>
	<!--script-->
	<script src="travel/js/modernizr.custom.js"></script>
	<script src="travel/js/bigSlide.js"></script>
	<script>
		$(document).ready(function() {
			$('.menu-link').bigSlide();
		});
	</script>
	<!-- web-fonts -->
	<link href='http://fonts.useso.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<div class="body-back">
		<div class="masthead pdng-stn1">
			<div id="menu" class="panel" role="navigation">
				<div class="wrap-content">
					<div class="profile-menu text-center">
						<img class="border-effect" src="images/pen.png" alt=" ">
						<h3>微日记</h3>

						<div class="pro-menu">
							<div class="logo">
								<li><a class=" link link--yaku  active" href="index.php"><span>主</span><span>页</span></a></li>
								<li><a class=" link link--yaku" href="signinorup.php"><span>登</span><span>录</span></a></li>
								<li><button id="teaBtn" style="border:none;outline:none;background:none;">
									<!-- <a class=" link link--yaku">
										<span>我</span><span>是</span><span>老</span><span>师</span></span>  </span></span>
										<i class="fa fa-check-square-o" id="teacher" aria-hidden="true" style='display:none'></i>
									</a></button></li>
									<li><button id="stuBtn" style="border:none;outline:none;background:none;">
									<a class=" link link--yaku">
										<span>我</span><span>是</span><span>学</span><span>生</span></span>  </span></span>
										<i class="fa fa-check-square-o" id="student" aria-hidden="true" style='display:unset'></i>
									</a></button></li> -->
								<!-- <p style="display:none" id="flag">1</p> -->
								<!-- <button id="test">test</button> -->
							</div>


						</div>
					</div>
				</div>
			</div>
			<div class="phone-box wrap push" id="home">
				<div class="menu-notify">
					<div class="profile-left">
						<a href="travel/#menu" class="menu-link"><i class="fa fa-list-ul"></i></a>
					</div>
					<div class="Profile-mid">
						<h5 class="pro-link"><a href="index.php">微日记</a></h5>
					</div>
					<div class="Profile-right">
				<!-- <form name="sign" action="./signinorup.php" method="post" id="signForm" style="display:none" >
					<input class="input" id="flag" type="text" name="flag" value="$teacher">
					<input type="submit" id="signSubmit" class="button" name="sign">
				</form> -->
							 <!-- <button id="signBtn" style="border:none;outline:none;background:none;">-->
						<a  href='signinorup.php' class="sign-in or sign-up"> 
						<i class='fa fa-user'></i></a>
						<!--</button> 
						 <script>
							var flag=document.getElementById("signForm").elements['flag'].value;
							if(flag=="2")
							{
								document.getElementById("student").style.display="none";
										document.getElementById("teacher").style.display="unset";
							}
							else 
							{
								document.getElementById("student").style.display="unset";
										document.getElementById("teacher").style.display="none";
							}
							$("#teaBtn").click(
                                	function () {
										document.getElementById("student").style.display="none";
										document.getElementById("teacher").style.display="unset";
										document.getElementById("signForm").elements['flag'].value="2";
                                }
							);
							$("#stuBtn").click(
                                	function () {
										document.getElementById("student").style.display="unset";
										document.getElementById("teacher").style.display="none";
										document.getElementById("signForm").elements['flag'].value="1";
                                }
                            );
							
							$("#signBtn").click(
                                function() {
                                    $("#signSubmit").click();
                                }
                            );
						</script> -->
						<!-- modal -->
						<div id="small-dialog" class="mfp-hide">
							<div class="login-modal">
								<div class="booking-info">
								</div>
								<div class="login-form">
								</div>
							</div>
						</div>
						<div id="small-dialog1" class="mfp-hide">
							<div class="login-modal">
								<div class="booking-info">
								</div>
								<div class="login-form signup-form">
								</div>
							</div>
						</div>
						<!-- //modal-two -->

					</div>
					<div class="clearfix"></div>
				</div>
				<!-- banner -->
				<div class="details-grid">
					<div class="details-shade">
					</div>
				</div>

			</div>
		</div>
</body>
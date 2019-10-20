<?php
session_start();
$id=$_GET['id'];
include("./logic/connect.php");
$sql="SELECT * FROM files where id=$id";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$filename=$row['fname'];
$txtpath=$row['ftxtpath'];
$score=$row['score'];
$sql="SELECT * FROM excellent where id=$id";
$result=mysqli_query($con,$sql);
$rows = mysqli_num_rows($result);
if($rows==0)
	$flag=false;
else
	$flag=true;
$_SESSION['excellentFlag']=$flag;

 function showDiary($filename ='')
{
    $file=fopen($filename,"r") or die("Open Error!");
	while(!feof($file))
	{
		echo fgets($file)."<br>";
	}
	fclose($file);
}
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
	<!-- custom css -->
	<link href="css/display.css" rel="stylesheet" type="text/css">
	<!-- <link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/login.css" rel="stylesheet" type="text/css">  -->
	<!--component-css-->
	<script src="travel/js/jquery-2.1.4.min.js"></script>
	<script src="travel/js/bootstrap.min.js"></script>
	<!--script-->
	<script src="travel/js/modernizr.custom.js"></script>
	<script src="travel/js/bigSlide.js"></script>
	
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css">

<!--suppress JSUnresolvedLibraryURL -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/star-rating.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$('.menu-link').bigSlide();
		});
	</script>
	<title><?php
	echo($filename);
	?></title>
	<!-- web-fonts -->
	<link href='http://fonts.useso.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
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
					<div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
				<!-- banner -->
	<div id="floater">
        <div id="content">
            <div id="mid-content" >
			
				<?php
					showDiary($txtpath);
				?>
			<div class="starBtn" style="float:right">
				<h6><?php if($flag)	echo("取消优秀作文"); else echo("设为优秀作文");?></h6><a href="setExcellent.php?id=<?php echo"$id"?>"><i class="fa fa-star" aria-hidden="true"></i></a>
			</div>
			<form style="float:left" name="star" action="setStar.php" method="post">
		<input id="input-21e" value="<?php echo($score);?>" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="xs"
		name="score">
		<input name="id" type="text" style="display:none" value="<?php echo"$id" ?>" >
        <div class="form-group" style="margin-top:10px">
            <button type="submit" class="btn btn-primary">保存评分</button>
        </div>
	</form>
	<!--自定义右键菜单-->
<div id="menu" class="skin">
	<ul>
 
	   <li><strong>加粗</strong></li>
 
	   <li>好句</li>
 
	   <li>病句</li>
 
 </ul>
</div>
 
<script src="http://api.51ditu.com/js/ajax.js"></script>
 
<style type="text/css">
#drawing {
	text-align : center;
	width : 500px;
	height : 500px;
	border : 1px solid blue;
	margin : 0 auto;
	overflow:auto;
	display:block;
}
body, div, ul, li { margin:0; padding:0; }
 
body { font:12px/1.5 \5fae\8f6f\96c5\9ed1; }
 
ul { list-style-type:none; }
 
#menu ul { position:absolute; float:left; border:1px solid #979797;background:#f1f1f1; padding:2px; box-shadow:2px 2px 2px rgba(0, 0, 0, .6); width:230px; overflow:hidden; }
 
#menu ul li { float:left; clear:both; height:24px; cursor:pointer; line-height:24px; white-space:nowrap; padding:0 30px; width:100%; display:inline-block; }
 
#menu ul li:hover { background:#E6EDF6; border:1px solid #B4D2F6; }
 
.skin {
	width : 100px;
	padding : 2px;
	visibility : hidden;
	position : absolute;
}
</style>
<script type="text/javascript">
//-->右键自定义菜单
window.onload = function() {
    var drawing = document.getElementById('mid-content');  
    var menu = document.getElementById('menu');
     
    /*显示菜单*/
    function showMenu() {
 
        var evt = window.event || arguments[0];
         
        /*获取当前鼠标右键按下后的位置，据此定义菜单显示的位置*/
        var rightedge = drawing.clientWidth-evt.clientX;
        var bottomedge = drawing.clientHeight-evt.clientY;
        /*如果从鼠标位置到容器右边的空间小于菜单的宽度，就定位菜单的左坐标（Left）为当前鼠标位置向左一个菜单宽度*/
        if (rightedge < menu.offsetWidth)               
            menu.style.left = drawing.scrollLeft + evt.clientX - menu.offsetWidth + "px";            
        else
        /*否则，就定位菜单的左坐标为当前鼠标位置*/
            menu.style.left = drawing.scrollLeft + evt.clientX + "px";
         
        /*如果从鼠标位置到容器下边的空间小于菜单的高度，就定位菜单的上坐标（Top）为当前鼠标位置向上一个菜单高度*/
        if (bottomedge < menu.offsetHeight)
            menu.style.top = drawing.scrollTop + evt.clientY - menu.offsetHeight + "px";
        else
        /*否则，就定位菜单的上坐标为当前鼠标位置*/
            menu.style.top = drawing.scrollTop + evt.clientY + "px";
             
        /*设置菜单可见*/
        menu.style.visibility = "visible";             
        LTEvent.addListener(menu,"contextmenu",LTEvent.cancelBubble);
    }
    /*隐藏菜单*/
    function hideMenu() {
        menu.style.visibility = 'hidden';
    }                              
    LTEvent.addListener(drawing,"contextmenu",LTEvent.cancelBubble);
    LTEvent.addListener(drawing,"contextmenu",showMenu);
    LTEvent.addListener(document,"click",hideMenu);                    
}
</script>
    <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function () {
                $inp.rating('refresh', {
                    showClear: true,
                    disabled: !$inp.attr('disabled')
                });
            });


            $('.btn-danger').on('click', function () {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function () {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function () {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
            });
            $("#input-21c").rating({
                min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
            });
        });
    </script>
			</div>
			
		</div>
	</div>
</body>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>About</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="" />

<!-- default css files -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- default css files -->
	
<!--web font-->
<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!--//web font-->
	

<!-- Body -->
<body>
	<!-- banner -->
	<div class="banner1">
		<div class="header-top">
			<div class="container">
				<div class="header-top-right">
					<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:example@example.com">example@hust.edu.cn</a></p>
					<?php
					if (isset($_SESSION['username'])) {
						$name = $_SESSION['username'];
						if($_SESSION['isTeacher'])
							echo "<p>欢迎,$name 老师</p>";
				   		else
					   		echo "<p>欢迎,$name 同学</p>";
					}
					?>
				</div>
			</div>
		</div>
		<div class="head">
			<div class="container">
				<div class="navbar-top">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand logo ">
							<h1 class="animated wow pulse" data-wow-delay=".5s">
								<a href="index.php">华中科技大学网络课堂系统</a></h1>
						</div>

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav link-effect-4">
							<li class="active"><a href="index.php" data-hover="Home">主页</a> </li>
							<li><a href="syllabus.php">课程表 </a> </li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">通知<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="event.php#school">学校通知</a></li>
									<li><a href="event.php#class">课堂通知</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">提交<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="submit.php#assignment">提交作业</a></li>
									<li><a href="submit_exp.php#lab">提交实验</a></li>
								</ul>
							</li>
							<?php
							if (isset($_SESSION['username'])) {
								echo '<li><a href="quit.php">退出登录</a> </li>';
							} else {
								echo '<li ><a href="welcome.php" >登录/注册</a> </li>';
							}
							?>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<h2>QUIZ</h2>
	</div>
    <!-- //banner -->
    h3>编辑信息</h3>
                <form method="post" id="form1" name="form1" action="commitadd.php">
                    <table id="main-content">
                        <tr>
                            <td width="10%"><strong>试卷名（少于20字）</strong></td>
                            <td width="90%"><textarea rows="2" id="examname" name="examname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>试卷描述（少于200字）</strong></td>
                            <td width="90%"><textarea rows="4" id="describe" name="describe"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>第一题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="firstname" name="firstname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="firsttype" id="firsttype"
                                        onchange="changeStyleEvent('firsttype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="firstoption1" name="firstoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="firstoption2" name="firstoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="firstoption3" name="firstoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="firstoption4" name="firstoption4"/></textarea></td>
                        </tr>
                        </tbody>

                        <tr>
                            <td width="10%"><strong>第二题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="secondname" name="secondname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="secondtype" id="secondtype"
                                        onchange="changeStyleEvent('secondtype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tbody id="secondtypetbody" style="display:;">
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="secondoption1" name="secondoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="secondoption2" name="secondoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="secondoption3" name="secondoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="secondoption4" name="secondoption4"/></textarea></td>
                        </tr>
                        </tbody>

                        <tr>
                            <td width="10%"><strong>第三题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="thirdname" name="thirdname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="thirdtype" id="thirdtype"
                                        onchange="changeStyleEvent('thirdtype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="thirdoption1" name="thirdoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="thirdoption2" name="thirdoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="thirdoption3" name="thirdoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="thirdoption4" name="thirdoption4"/></textarea></td>
                        </tr>
                        </tbody>

                        <tr>
                            <td width="10%"><strong>第四题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="fourthname" name="fourthname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="fourthtype" id="fourthtype"
                                        onchange="changeStyleEvent('fourthtype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tbody id="fourthtypetbody" style="display:;">
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fourthoption1" name="fourthoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fourthoption2" name="fourthoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fourthoption3" name="fourthoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fourthoption4" name="fourthoption4"/></textarea></td>
                        </tr>
                        </tbody>

                        <tr>
                            <td width="10%"><strong>第五题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="fifthname" name="fifthname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="fifthtype" id="fifthtype"
                                        onchange="changeStyleEvent('fifthtype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tbody id="fifthtypetbody" style="display:;">
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fifthoption1" name="fifthoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fifthoption2" name="fifthoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fifthoption3" name="fifthoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="fifthoption4" name="fifthoption4"/></textarea></td>
                        </tr>
                        </tbody>
                        <tr>
                            <td width="10%"><strong>第六题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="sixthname" name="sixthname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="sixthtype" id="sixthtype"
                                        onchange="changeStyleEvent('sixthtype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tbody id="sixthtypetbody" style="display:;">
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="sixthoption1" name="sixthoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="sixthoption2" name="sixthoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="sixthoption3" name="sixthoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="sixthoption4" name="sixthoption4"/></textarea></td>
                        </tr>
                        </tbody>

                        <tr>
                            <td width="10%"><strong>第七题题目（少于100字）</strong></td>
                            <td width="90%">
                                <textarea rows="2" id="seventhname" name="seventhname"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>题目类型</strong></td>
                            <td width="90%">
                                <select type="button" name="seventhtype" id="seventhtype"
                                        onchange="changeStyleEvent('seventhtype');">
                                    <option value="1" selected="selected">单选题</option>
                                    <option value="2">填空题</option>
                                    <option value="3">简答题</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项1内容</strong></td>
                            <td width="90%"><textarea rows="2" id="seventhoption1" name="seventhoption1"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项2内容</strong></td>
                            <td width="90%"><textarea rows="2" id="seventhoption2" name="seventhoption2"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项3内容</strong></td>
                            <td width="90%"><textarea rows="2" id="seventhoption3" name="seventhoption3"/></textarea></td>
                        </tr>
                        <tr>
                            <td width="10%"><strong>选项4内容</strong></td>
                            <td width="90%"><textarea rows="2" id="seventhoption4" name="seventhoption4"/></textarea></td>
                        </tr>
                        </tbody>


                       <tr>
                            <td width="10%">

                                <input type="submit" value="提交"/>
                            </td>

                            <td width="90%"><input type="reset" value="重置"/>
                                <input style="position: relative;left: 120px;" type="button" onclick="Cancel();"
                                       value="取消"/></td>
                        </tr>
                    </table>
                </form>

            </div>

        </div>
        <!-- 表单结束 -->
    </div>

</div>
<script language="javascript" type="text/javascript">
    //取消则返回到上一个历史页面
    function Cancel() {
        window.history.back();
    }

    /**
     * 如果用户上次选择的是选择题，输入了选项里面的内容，之后选择了填空题或者简答题，之后在切换回选择题时
     * 之前输入的选项内容要被清空
     * */
    function clearAllOptionLastValue(name) {
        var index = name.indexOf("type");
        var commonstr = name.substring(0, index);

        var allOptionSuffixs = Array('option1', 'option2', 'option3', 'option4');
        for (var i = 0; i < allOptionSuffixs.length; ++i) {
            // 清空之前输入的文字
            document.getElementById(commonstr + allOptionSuffixs[i]).value = "";
        }
    }

    // 题目类型选择
    function changeStyleEvent(name) {
        var typevalue = document.getElementById(name).value;
        var tbodyidstr = name + "tbody";
        // 获取tbody
        var tbody = document.getElementById(tbodyidstr);
        // 只有单选题才需显示选项
        if (typevalue != "1") {
            tbody.style.display = "none";
        }
        else {
            tbody.style.display = "";
            // 清空选项中的上次的内容
            clearAllOptionLastValue(name);
        }

    }
</script>
	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- //Default-JavaScript-File -->


</body>
<!-- //Body -->
</html>
<?php
session_start();//启用php的session功能
include("./logic/connect.php");//连接数据库
?>
<!DOCTYPE html>
<html lang="zh-CN">
<!-- Head -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Zx-Editor,html-editor,editor" />
<meta charset utf="8">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/edit.css"> -->
    <link href="./zx-editor-2.x.x/demo/css/index.css" rel="stylesheet" type="text/css" />
    <title>在线编辑</title>
</head>

<body>
<div class="holder" id="idholder" style="display:none;"><?php echo($_SESSION['userid']); ?></div>
<div class="container">
  <header class="border-bm">
  <div class="left-wrapper">
      <a href="#" class="back" onclick="handleBackClick()">返回</a>
    </div>
    <div class="title">发布微日记</div>
    <div class="right-wrapper">
      <a href="#" class="preview" onclick="handlePreviewClick()">预览</a>
    </div>
  </header>
  <!--标题-->
  <section class="title-wrapper border-bm" style="margin-top:44px">
    <div class="item placeholder">标题<span>（不超过30个字）</span></div>
    <div class="item input-hook" contenteditable="true" style="display: none;"></div>
  </section>
  <!--导语、摘要-->
  <section class="summary-wrapper border-bm" style="display: none;">
    <div class="item placeholder">输入导语，140字内（非必填）</div>
    <div class="item input-hook" contenteditable="true" style="display: none;"></div>
  </section>
  <article>
    <div class="zx-eidtor-container" id="editorContainer"></div>
  </article>
</div>

<!--预览-->
<div class="article-preview-wrapper">
  <header class="border-bm">
    <div class="left-wrapper">
      <a href="#" class="back-text" onclick="handleBackPreviewClick()">继续编辑</a>
    </div>
    <div class="right-wrapper">
      <a href="#" class="submit active" onclick="handleSubmitClick()">完成</a>
    </div>
  </header>
  <div class="preview-wrapper">
    <div class="preview-cover"><img src=""></div>
    <div class="preview-title"></div>
    <div class="preview-summary"></div>
    <div class="preveiw-content"></div>
  </div>
</div>

<script src="https://cdn.bootcss.com/js-polyfills/0.1.42/polyfill.min.js"></script>
<!--exif获取照片参数插件-->
<script src="./zx-editor-2.x.x/demo/libs/exif.min.js"></script>
<script src="./zx-editor-2.x.x/demo/libs/zx-debug.min.js"></script>
<script src="./zx-editor-2.x.x/dist/js/zx-editor.min.js"></script>
<script src="./zx-editor-2.x.x/demo/js/index.js"></script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在线编辑</title>
</head>
<body>
<style type="text/css">
        .outer
        {
            width:80%;
            margin:auto;
        }
        .toolbar {
            border: 1px solid #ccc;
            font-size:4em;
            background:#f1f1f1;
        }
        .text {
            border: 1px solid #ccc;
            height: 400px;
            border-top-color:transparent;
        }
        .toolbar div
        {
           width:20%;
        }
        .w-e-toolbar .w-e-droplist
        {
            width:100%;
        }
        .w-e-toolbar .w-e-droplist .w-e-dp-title
        {
          width:100%;
        }
    </style>
<div class="outer">
    <div id="div1" class="toolbar">
    </div>
    <div id="div2" class="text"> <!--可使用 min-height 实现编辑区域自动增加高度-->
    </div>
</div>
    <script type="text/javascript" src="/wangEditor/wangEditor.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#div1','#div2')
        editor.customConfig.menus = [
        'head',
        'bold',
        'italic',
        'underline',
        'justify'
    ]
        editor.create()
    </script>
</body>
</html>
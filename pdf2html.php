<?php
//header("Content-type:text/html;charset=utf-8");
//word转html 展示

//  $lj=$_FILES['file'];//传来的是文件位置 具体看自己的传值 upload/user/20170306/20170306xgtlne.doc
// $lj = 'C:/Users/Zayle/WeDiary/test.pdf';
// $lj = str_replace("/", '\\', $lj); //把路径改为\号 例如 upload\user\20170306\20170306xgtlne.doc
function word2html($wordname,$htmlname) 
 { 
    $word = new COM("Word.application") or die("sdfs");
    $word ->Visible = 1;
    $doc = $word->Documents->Open('C:\test1\test.doc');
    $doc ->SaveAs2();
    $doc ->ExportAsFixedFormat("C:\test1\\sds.pdf",17);
    $word ->Quit();
 } 
 
// word2html('D:/www/test/6.docx','D:/www/test/6.html');
//服务器或本地的word具体位置 例如'D:\phpStudy\WWW\GongshuUnion\.upload\user\20170306\20170306xgtlne.doc'
// $address = '';
word2html('C:/Users/Zayle/WeDiary/test.pdf', 'C:/Users/Zayle/WeDiary/test.html');
//跳转时可以在后最加上.html 
//例如  $url=  http://localhost/GongshuUnion/upload/user/20170306/20170306xgtlne.doc.html
//我这里一共传了两个值 一个是 $_GET['file'] = upload/user/20170306/20170306xgtlne.doc 
//另一个是$_GET['url']=http://localhost/GongshuUnion/upload/user/20170306/20170306xgtlne.doc.html
// $url = $_GET['url'];
// Header("Location:$url");

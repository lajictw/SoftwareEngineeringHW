<?php
$conv=new Convert;
$prename="C:/Users/Zayle/WeDiary/test.doc";
$postname="C:/Users/Zayle/WeDiary/test.pdf";
$conv->run($prename,$postname);
exec("pdftotext $postname");
class Convert{
    
    private $osm;
    
    // 构造函数，启用OpenOffice的COM组件
    public function __construct(){
        ini_set('magic_quotes_runtime', 0); // 设置运行时间
        $this->osm = new COM("com.sun.star.ServiceManager") or die("Please be sure that OpenOffice.org is installed.n");
    }
    
    private function MakePropertyValue($name, $value){
        $oStruct = $this->osm->Bridge_GetStruct("com.sun.star.beans.PropertyValue");
        $oStruct->Name = $name;
        $oStruct->Value = $value;
        return $oStruct;
    }
    
    private function transform($input_url, $output_url){
        $args = array($this->MakePropertyValue('Hidden', true));
        $oDesktop = $this->osm->createInstance("com.sun.star.frame.Desktop");
        $oWriterDoc = $oDesktop->loadComponentFromURL($input_url, '_blank', 0, $args);
        $export_args = array($this->MakePropertyValue('FilterName', 'writer_pdf_Export'));
        $oWriterDoc->storeToURL($output_url, $export_args);
        $oWriterDoc->close(true);
        return 1;
    }

    /**
     * office文件转换pdf格式
     * @param  string $input  需要转换的文件
     * @param  string $output 转换后的pdf文件
     * @return return string 页数
     */
    public function run($input = '', $output = ''){
        if(empty($input) || empty($output)){
            return ['error' => 1, 'msg' => '参数缺失', 'flag' => 'run'];
        }
        $input = "file:///" . str_replace("\\", "/", $input);
        $output = "file:///" . str_replace("\\", "/", $output);
        return $this->transform($input, $output);
    }

}
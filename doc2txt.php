<?php
//用来完成转换的类
class Convert{
    
    private $osm;
    
    // 构造函数，启用OpenOffice的COM组件
    public function __construct(){
        ini_set('magic_quotes_runtime', 0); // 设置运行时间
        $this->osm = new COM("com.sun.star.ServiceManager") or die("Please be sure that OpenOffice.org is installed.n");//异常处理
    }
    /**
     * 设置属性值
     * @param  string $name  需要设置的属性
     * @param  string $value 需要设置的属性值
     * @return return $ostruct 返回的结构体
     */
    private function MakePropertyValue($name, $value){
        $oStruct = $this->osm->Bridge_GetStruct("com.sun.star.beans.PropertyValue");
        $oStruct->Name = $name;
        $oStruct->Value = $value;
        return $oStruct;
    }
    /**
     * office文件转换pdf格式
     * @param  string $input_url  需要转换的文件路径
     * @param  string $output_url 转换后的pdf文件路径
     * @return return 1
     */
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
     * office文件转换txt格式
     * @param  string $input  需要转换的文件
     * @param  string $output 转换后的pdf文件
     * @return return string 转换后的txt文件
     */
    public function run($input = '', $output = ''){
        if(empty($input) || empty($output))//判断输入值是否为空,排除错误调用
        {
            return ['error' => 1, 'msg' => '参数缺失', 'flag' => 'run'];//异常处理
        }
        $input = "file:///" . str_replace("\\", "/", $input);//修改路径斜线风格
        $newoutput = "file:///" . str_replace("\\", "/", $output);//修改路径斜线风格
        $this->transform($input, $newoutput);//转换为pdf文件
        exec("pdftotext $output");//转换为txt文件
        return $output;//返回转换完成的路径
    }
}
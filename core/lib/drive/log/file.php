<?php
namespace core\lib\drive\log;

use core\lib\conf;

class file{

    //日志存储目录
    public $path;
    public function __construct(){
        $option = conf::get('OPTION','log');
        $this->path = $option['PATH'];
    }

    public function log($message,$file){
        /*
         * 1,确定日志存储目录是否存在
         * 2，写日志（若不存在，新建）
         */
        if (!is_dir($this->path.date('Ymd'))){
            mkdir($this->path.date('Ymd'),'0777',true);
        }

//        var_dump($this->path.$file.'.php');exit;
//        $message = date('Y-m-d H:i:s').$message;
        file_put_contents($this->path.date('Ymd').'/'.$file.'.php',date('Y-m-d H:i:s').
            json_encode($message).PHP_EOL,FILE_APPEND);
    }
}
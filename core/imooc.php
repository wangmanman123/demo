<?php
namespace core;

class imooc
{
    public static $classMap = array();
    static public function run(){
        echo "启动框架...";
        $route = new \core\route();
    }

    static public function load($class){
        //自动加载类
        //new \core\route();
        //$class = '\core\route';
        //IMOOC.'/core/route.php';

        if (isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = IMOOC.'/'.$class.'.php';
            if (is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }

    }
}
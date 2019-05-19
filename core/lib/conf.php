<?php
namespace core\lib;
class conf
{
    static public $conf = array();
    static public function get($name,$file){
        /*
         * 1,判断配置文件是否存在
         * 2,判断配置是否存在
         * 3,缓存配置
         */

        if (isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else{
            $file_path = IMOOC.'\core\config\\'.$file.'.php';
            if (is_file($file_path)){
                $conf = include $file_path;
                if (isset($conf[$name])){
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else{
                    throw new \Exception("配置项不存在".$name);
                }
            }else{
                throw new \Exception("配置文件不存在");
            }
        }
    }

    static public function all($file){

        if (isset(self::$conf[$file])){
            return self::$conf[$file];
        }else{
            $file_path = IMOOC.'\core\config\\'.$file.'.php';
            if (is_file($file_path)){
                $conf = include $file_path;
                self::$conf[$file] = $conf;
                return $conf;
            }else{
                throw new \Exception("配置文件不存在");
            }
        }
    }


}
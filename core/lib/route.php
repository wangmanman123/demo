<?php
namespace core\lib;
class route
{
    public $ctrl;
    public $action;
    public function __construct(){
        /**
         * 1, XXX.com/index/index
         *    XXX.com/index.php/index/index
         * 隐藏index.php
         * 2,获取url的参数部分
         * 3，返回对应的控制器和方法
         *
         */
//        var_dump($_SERVER);
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $path_arr = explode('/',trim($path,'/'));
            if (isset($path_arr[0])){
                $this->ctrl = $path_arr[0];
            }
            if (isset($path_arr[1])){
                $this->action = $path_arr[1];
            }

            //url多余的部分转换成GET参数 /index/index/id/5/name/mm

            $count = count($path_arr);
            $i = 2;
            if ($i < $count){
                if (isset($path_arr[$i + 1])){
                    $_GET[$path_arr[$i]] = $path_arr[$i + 1];
                }
                $i = $i +2;
            }

        }else{
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }

}
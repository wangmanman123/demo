<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2019/5/7
 * Time: 10:15
 */

//命名空间
//$b = "b";
//echo include('test2.php');

//echo include 'test2.php';
//
//if ((include('test2.php')) == 4){
//    echo 'yes';
//}
//
//if ((include 'test2.php') == 4){
//    echo 'yes';
//}
//

//echo $a;

//namespace demo1;
//
//const TEST = 'this is a const';
//function demo(){
//    echo "this is a function1";
//}
//include "test2.php";
//
//use demo\demo1\demo3;
//demo3\demo3();


//namespace demo2;
//
//const TEST2 = 'this is a const2';
//function demo2(){
//    echo "this is a function2";
//}
//
//include "test2.php";
//
//
//
//demo2();
//\demo1\demo();


//错误处理
//ini_set("display_errors",1);
//error_reporting(E_ALL);
////gettype($a);
////trigger_error("a没有定义",E_NOTICE);
//
//function my_error($error_type,$error_message,$file,$line){
//    $exit = false;
//    switch ($error_type){
//        case E_NOTICE:
//        case E_USER_NOTICE:
//            $error = "注意";
//            break;
//        case E_WARNING:
//        case E_USER_WARNING:
//            $error = "警告";
//            break;
//        case E_ERROR:
//        case E_USER_ERROR:
//            $exit = true;
//            $error = "错误";
//            break;
//    }
//
//    echo $error.": ".$error_message." in ".$file." on ".$line;
//    error_log("发送错误",3,"E:/wamp64/logs/php_error.log");
//    error_log("发送错误",1,"2241841662@qq.com");
//}
//
//set_error_handler("my_error");
//
////trigger_error("退出程序",E_USER_WARNING);
//gettype($a);
//get_Tyep();


class Superman
{
    protected $module;

    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }
}

class Container
{
    public $binds;

    public $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);
        var_dump($parameters);exit;
        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}

$container = new Container;


//$container->bind('superman', function($container, $moduleName) {
//    return new Superman($container->make($moduleName));
//});

$a = function($container, $moduleName) {
    return new Superman($container->make($moduleName));
};


var_dump($a);exit;








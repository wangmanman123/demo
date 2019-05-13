<?php
/**
 * 入口文件
 * 1，定义常量
 * 2，加载函数库
 * 3，启动框架
 */

define('IMOOC',realpath('./'));

define('CORE',IMOOC.'/core');
define('APP',IMOOC.'/app');

define('DEBUG',true);
if (DEBUG){
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}
//error_reporting(E_ALL & ~E_NOTICE);
//trigger_error("退出程序",E_USER_ERROR);
//exit("退出程序");
//gettype($a);


include CORE.'/common/function.php';

include CORE.'/imooc.php';
spl_autoload_register('\core\imooc::load');


\core\imooc::run();
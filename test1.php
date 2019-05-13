<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2019/5/7
 * Time: 10:15
 */

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

gettype($a);

//错误处理
function my_error($error_type,$error_message,$file,$line){
    $exit = false;
    switch ($error_type){
        case E_NOTICE:
        case E_USER_NOTICE:
            $error = "注意";
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error = "警告";
            break;
        case E_ERROR:
        case E_USER_ERROR:
            $exit = true;
            $error = "错误";
            break;
    }

    echo $error.": ".$error_message." in ".$file." on ".$line;
}

set_error_handler("my_error");

//trigger_error("退出程序",E_USER_WARNING);
gettype($a);
//get_Tyep();









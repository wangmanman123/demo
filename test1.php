<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2019/5/7
 * Time: 10:15
 */

//echo include('test2.php');
//
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

namespace demo1;

const TEST = 'this is a const';
function demo(){
    echo "this is a function";
}

echo TEST;
demo();

namespace demo2;

const TEST2 = 'this is a const2';
function demo2(){
    echo "this is a function2";
}

echo TEST2;

demo2();
\demo1\demo();






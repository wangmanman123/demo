<?php

class MyClass{

    public $a = 1;

    function __call($funcionName,$args)
    {
        echo "方法".$funcionName."不存在";
    }
}

$class1 = new MyClass();
$class1->say("hello",'world');  //方法say不存在,$args的值是['hello','world']




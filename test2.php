<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2019/5/7
 * Time: 10:15
 */
//namespace demo\demo1\demo3;
//function demo3(){
//    echo "this is a function3";
//}
//
//class test{
//
//}

class User
{
    /**
     * log doc
     */
    protected $log;
    /**
     * loglog doc
     */
    protected $loglog;

//    public function __construct(Log $log)
//    {
//        $this->log = $log;
//    }

    public function login($b = 0)
    {
        // 登录成功，记录登录日志
        echo 'login success...'."$b";
//        $this->log->write();
    }

}




$a = new ReflectionClass('User');
$properties = $a->getProperties();   //返回一个由ReflectionProperty对象构成的数组
$methods = $a->getMethods();         //返回ReflectionMethod对象构成的数组
$instance  = $a->newInstanceArgs();


foreach ($properties as $k=>$v){
//    var_dump($v->getName());   //得到属性名字
}
foreach ($methods as $k=>$v){
        $method_str = $v->getName();   //方法的名称字符串

    $method = $a->getMethod($method_str);  //获取方法
    $method->invoke($instance);   //执行方法
    $para = $method->getParameters();
    var_dump($para);exit;
}

//var_dump($para);exit;

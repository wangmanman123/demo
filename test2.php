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
    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    public function login()
    {
        // 登录成功，记录登录日志
        echo 'login success...';
        $this->log->write();
    }

}

var_dump(User::class);exit;
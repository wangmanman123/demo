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

//class User
//{
//    /**
//     * log doc
//     */
//    protected $log;
//    /**
//     * loglog doc
//     */
//    protected $loglog;
//
//    public function __construct($a = 123)
//    {
////        $this->log = $log;
//        echo 'this is construct';
//    }
//
//    public function login($b = 0)
//    {
//        // 登录成功，记录登录日志
//        echo 'login success...'."$b";
////        $this->log->write();
//    }
//
//}
//
//
//
//
//$a = new ReflectionClass('User');
//$properties = $a->getProperties();   //返回一个由ReflectionProperty对象构成的数组
//$methods = $a->getMethods();         //返回ReflectionMethod对象构成的数组
//$instance  = $a->newInstanceArgs();
//$con = $a->getConstructor();   //执行构造函数
//$para = $con->getParameters();
//foreach ($para as $k => $v) {
//    $class = $v->getClass();
//    if (is_null($class)) {
//        if ($v->isDefaultValueAvailable()) {
//            $dependencies[] = $v->getDefaultValue();
//        }else{
//            $dependencies[] = '0';
//        }
//    }
//var_dump($dependencies);exit;
////exit;
//
//
//    foreach ($properties as $k => $v) {
////    var_dump($v->getName());   //得到属性名字
//    }
//    foreach ($methods as $k => $v) {
//        $method_str = $v->getName();   //方法的名称字符串
//
//        $method = $a->getMethod($method_str);  //获取方法
//        $method->invoke($instance);   //执行方法
//        $para = $method->getParameters();  //获得方法参数
//
//        foreach ($para as $k => $v) {
//            $class = $v->getClass();
//            if (is_null($class)) {
//                if ($v->isDefaultValueAvailable()) {
//                    $dependencies[] = $v->getDefaultValue();   //获取参数默认值
//                }
//            }
//        }
//    }
//}

//var_dump($para);exit;

class Point
{
    public $x;
    public $y;

    /**
     * Point constructor.
     * @param int $x  horizontal value of point's coordinate
     * @param int $y  vertical value of point's coordinate
     */
    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }
}



class Circle
{
    /**
     * @var int
     */
    public $radius;//半径

    /**
     * @var Point
     */
    public $center;//圆心点

    const PI = 3.14;

    public function __construct(Point $point, $radius = 1)
    {
        $this->center = $point;
        $this->radius = $radius;
    }

    //打印圆点的坐标
    public function printCenter()
    {
        printf('center coordinate is (%d, %d)', $this->center->x, $this->center->y);
    }

    //计算圆形的面积
    public function area()
    {
        return 3.14 * pow($this->radius, 2);
    }
}

//$a = new Circle();
//var_dump($a);exit;

//构建类的对象
function make($className)
{
    $reflectionClass = new ReflectionClass($className);
    $constructor = $reflectionClass->getConstructor();

    $parameters  = $constructor->getParameters();
//
    $dependencies = getDependencies($parameters);
//    var_dump($dependencies);exit;
    return $reflectionClass->newInstanceArgs($dependencies);
}

//依赖解析
function getDependencies($parameters)
{
    $dependencies = [];
    foreach($parameters as $parameter) {
        $dependency = $parameter->getClass();
        if (is_null($dependency)) {
            if($parameter->isDefaultValueAvailable()) {
                $dependencies[] = $parameter->getDefaultValue();
            } else {
                //不是可选参数的为了简单直接赋值为字符串0
                //针对构造方法的必须参数这个情况
                //laravel是通过service provider注册closure到IocContainer,
                //在closure里可以通过return new Class($param1, $param2)来返回类的实例
                //然后在make时回调这个closure即可解析出对象
                //具体细节我会在另一篇文章里面描述
                $dependencies[] = '0';
            }
        } else {
            //递归解析出依赖类的对象
            $dependencies[] = make($parameter->getClass()->name);

        }
    }


    return $dependencies;
}

$circle = make('Circle');   //实例化对象
var_dump($circle);exit;
$area = $circle->area();

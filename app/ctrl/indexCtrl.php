<?php
namespace app\ctrl;

class indexCtrl {

    //模型
    public function index(){
    echo "this is index";
    $model = new \core\lib\model();
    $sql = "select * from test_user";
    $res = $model->query($sql);
    var_dump($res->fetchAll());
}

//    //视图
//    public function index(){
//        $data = 'manman123 ';
//        $view = new \core\lib\view();
//        $view->assign('data',$data);
//        $view->display('index.html');
//    }

    //配置
//    public function index(){
//        $value1 = \core\lib\conf::get('ctrl','route');
//        $value2 = \core\lib\conf::get('action','route');
//        var_dump($value1);var_dump($value2);exit;
//    }
}
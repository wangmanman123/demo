<?php
namespace core\lib;

class view{
    public $assign = array();
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    public function display($file){
        $file = APP.'/view/'.$file;
        if (is_file($file)){
            extract($this->assign);
            include $file;
        }

    }
}
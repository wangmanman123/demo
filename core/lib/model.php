<?php
namespace core\lib;
use core\lib\conf;

class model extends \PDO{
    public function __construct()
    {
//        $dsn = 'mysql:host=localhost;dbname=test';
//        $username = 'root';
//        $passwd = '123456';
        $config = conf::all('database');
        $dsn = $config['DSN'];
        $username = $config['USERNAME'];
        $passwd = $config['PASSWORD'];

        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }
}

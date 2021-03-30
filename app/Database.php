<?php

namespace APP;
use \PDO;

class Database{
    const PORT = 3306;
    const HOST = "11.5.0.8";
    private $dbname;
    private $db_user;
    private $db_pass;
    public $pdo;

    public function __construct($dbname='predfackers',$db_user='predfackers',$db_pass='predfackers'){
        $this->dbname=$dbname;
        $this->db_user=$dbname;
        $this->db_pass=$db_pass;
    }

    public function  getPdo(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:host=' . self::HOST . ':' . self::PORT . ';dbname='. $this->db_name, ''. $this->db_user .'', '' . $this->db_pass .'' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
}

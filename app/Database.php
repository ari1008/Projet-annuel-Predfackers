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
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
    }

    public function  getPdo(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:host=' . self::HOST . ':' . self::PORT . ';dbname='. $this->dbname, ''. $this->db_user .'', '' . $this->db_pass .'' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function  insert($table, $tab){
        var_dump($tab);
        $x =0;
        $lenght = count($tab);
        $tabkey =array_keys($tab);
        $sql = "INSERT INTO " . $table . " ( ";
        while ($x<$lenght-1){
            $sql = $sql ." ". $tabkey[$x] . ", ";
            $x++;
        }
        $sql =$sql . " " .  $tabkey[$x] ;
        $x=0;
        $sql = $sql . " ) VALUES (";
        while ($x<$lenght-1){
           $sql = $sql . " :" . $tabkey[$x] . ", " ;
           $x++;
        }
        $sql =$sql . " :" .  $tabkey[$x]  . " )";
        $data = $this->pdo->prepare($sql);
        $result=$data->execute($tab);
         var_dump($result);
        return $result;
    }

    public function select(){
        
    }

    function Delete($table, $one=0,$where=null){
        require ROOT . '/config/config.php';
        $q = "DELETE FROM " . $table;
        if(!is_null($where)){
            $q .= " WHERE ";
            $lenght = count($where);
            $key = array_keys($where);
            for ($x=0; $x<$lenght-1;$x++){
                $q .= $key[$x] . "=:" . $key[$x] . ',';
            }
            $q .= $key[$x] . "=:" . $key[$x];
            $stmt= $this->pdo->prepare($q);
            $stmt->execute($where);
            if (!is_null($one)){
                $data = $stmt->fetchAll();
                return $data;
            }else{
                $data = $stmt->fetch();
                return $data;
            }
        }
    }
}



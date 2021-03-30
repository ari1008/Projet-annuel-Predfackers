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

    public function  insert($table, $tab){
        $lenght = count($tab);
        $tabkey =array_keys($tab);
        $q = "INSERT INTO " . $table. "(";
        for($x=0;$x<$lenght-1;$x++){
            $q.= $tabkey[$x] . ",";

        }
        $q .=$tabkey[$x] .") VALUES('";
        $virgule = implode("','", $tab);
        $q.= $virgule . "')";
        $data = $this->pdo->query($q);
        return $data;
    }

    public function select($table, $tab, $everything=0, $whereTab=null,$operator=null,$one = null){
        $lengthTab= count($tab);
        require ROOT . '/config/config.php';
        if(1==$everything){
            $q = 'SELECT * FROM ' . $table;
        }else{
            $q = 'SELECT ';
            for ($x=0;$x<$lengthTab-1;$x++){
                $q .= $tab[$x] . ', ';
            }
            $q.= $tab[$x] . ' FROM ' . $table;
            if (!is_null($whereTab)){
                $lenghtWhere = count($whereTab);
                $keyWhere = array_keys($whereTab);
                $where = ' WHERE ';
                for ($x=0;$x<$lenghtWhere-1;$x++){
                    $where .= $keyWhere[$x] . "=:" . $keyWhere[$x] . ' ' . $operator[$x] . ' ';
                }
                $where .= $keyWhere[$x] . "=:" . $keyWhere[$x] . ' ';
                $q .= $where;
                $stmt= $this->pdo->prepare($q);
                $stmt->execute($whereTab);
                if (!is_null($one)){
                    $data = $stmt->fetchAll();
                    return $data;
                }else{
                    $data = $stmt->fetch();
                    return $data;
                }
            }
        }
        $stmt = $this->pdo->query($q);
        if (!is_null($one)){
            $data = $stmt->fetchAll();
            return $data;
        }else{
            $data = $stmt->fetch();
            return $data;
        }
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



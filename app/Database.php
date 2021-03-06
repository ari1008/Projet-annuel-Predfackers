<?php

namespace APP;
use \PDO;
/*
 * Class mère qui vas nous permettre de ce connecter a la base de données
 */
class Database{
    const PORT = 3306;
    const HOST = "12.5.0.8";
    private $dbname;
    private $db_user;
    private $db_pass;
    public $pdo;

    public function __construct($dbname='predfackers',$db_user='remy',$db_pass='remy'){
        $this->dbname=$dbname;
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
    }

    /*
     * function pour ce connecter a la base de données
     */
    public function getPdo(){
        if($this->pdo === null){
            #$test = "'mysql:host=' . self::HOST . ':' . self::PORT . ';dbname='. $this->dbname, ''. $this->db_user .'', '' . $this->db_pass .'' ";
            #var_dump($test);
            $pdo = new PDO('mysql:host=' . self::HOST . ':' . self::PORT . ';dbname='. $this->dbname, ''. $this->db_user .'', '' . $this->db_pass .'' );
            #$pdo = new PDO($test);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function insert($table, $tab){
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
        return $result;
    }
    public function selectOneAll($table, $tab, $operator= null){
        $x=0;
        $lenght = count($tab);
        $tabkey =array_keys($tab);
        $lenghtOperator = count($operator);
        $sql = "Select * FROM " . $table . " WHERE ";
        while($x<$lenght-1) {
            $sql = $sql . $tabkey[$x] . "=:" . $tabkey[$x] . " " . $operator[$x] . " ";
            $x++;
        }
        $sql =$sql . $tabkey[$x]. "=:" . $tabkey[$x] ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($tab);
        $result=$stmt->fetch();
        return $result;
    }

    /*
     * function qui vas nous permettre de selectionner l'utilisateur
     */
    public function SelectUser($email){
        $q = "SELECT id_user, type, password FROM USER WHERE email=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return $user;
    }

    /*
     * function qui vas nous permettre de supprimer des choses dynamiquements
     * presque pas utiliser
     */

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



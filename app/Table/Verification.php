<?php
namespace APP\Table;
use APP\Database;
use \PDO;

class Verification extends  Database{

    public function validateOne($id_product, $valid){
        $q = "INSERT INTO VERIFACTION (product,validate) VALUES (?,?)";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_product,$valid]);
    }

    public function validate($id_product,$price, $valid){
        $q = "INSERT INTO VERIFACTION (product,newprice,validate) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_product,$price,$valid]);
    }

}
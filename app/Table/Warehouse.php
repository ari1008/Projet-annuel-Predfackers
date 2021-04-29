<?php


namespace APP\Table;
use \PDO;
use APP\Database;


class Warehouse extends  Database{
    public function idSelect($id_warehouse){
        $q ="SELECT   number, street, city, postal_code, 
       district, region, country FROM WAREHOUSE WHERE id_warehouse=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_warehouse]);
        $result = $stmt->fetch();
        return $result;
    }

}
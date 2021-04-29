<?php


namespace APP\Table;
use \PDO;
use APP\Database;

class Address extends  Database{
    public function idSelect($id_address, $id_user){
        $q = "SELECT   number, street, city, 
       postal_code, district, region, country FROM ADDRESS WHERE id_address=? AND user=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_address,$id_user ]);
        $calculatedPrice = $stmt->fetch();
        return $calculatedPrice;
    }



}
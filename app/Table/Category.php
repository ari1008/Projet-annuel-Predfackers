<?php


namespace APP\Table;
use APP\Database;
use \PDO;

class Category extends Database {
    public function ViewUserAll(){
        $q = "SELECT id_category, name, photo FROM USER ORDER BY id_category";
        $stmt = $this->pdo->query($q);
        $user = $stmt->fetchAll();
        return $user;
    }

}
<?php

namespace app\Table;
use APP\Database;
use \PDO;


class Photo extends Database {
    public function insert($lastid,$name){
        $sql = "INSERT INTO PHOTO (product, name) VALUES (? ,?) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$lastid,$name]);
    }

    public function viewId($id){
        $sql = "SELECT name FROM PHOTO WHERE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $photoName = $stmt->fetchAll();
        return $photoName;
    }

    public function delete($id){
        $sql = "DELETE FROM PHOTO WHERE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

}
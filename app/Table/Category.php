<?php
namespace APP\Table;
use APP\Database;
use \PDO;

class Category extends Database {
    public function ViewCategoryAll(){
        $q = "SELECT id_category, name, photo FROM CATEGORY ORDER BY id_category";
        $stmt = $this->pdo->query($q);
        $category = $stmt->fetchAll();
        return $category;
    }

    public function ViewCategory($id_category){
        $q = "SELECT id_category, name, photo FROM CATEGORY WHERE id_category=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_category]);
        $category = $stmt->fetch();
        return $category;
    }

    public function categoryID(){
        $q = "SELECT id_category AS id, name FROM CATEGORY ORDER BY id_category";
        $stmt = $this->pdo->query($q);
        $category = $stmt->fetchAll();
        return $category;
    }

}
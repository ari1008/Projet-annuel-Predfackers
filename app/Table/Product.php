<?php
namespace APP\Table;
use APP\Database;
use \PDO;

class Product extends Database{

    public function  viewProductAll(){
        $sql = "SELECT id_product AS id, PRODUCT.name AS name, CATEGORY.name AS category, MARK.name AS mark, PRODUCT.price 
                AS price FROM PRODUCT INNER JOIN CATEGORY ON PRODUCT.category = CATEGORY.id_category 
                INNER JOIN MARK ON PRODUCT.mark = MARK.id_mark ORDER BY id_product";
        $stmt = $this->pdo->query($sql);
        $product = $stmt->fetchAll();
        return $product;
    }

    public function  viewProduct($id_product){
        $sql = "SELECT id_product AS id, PRODUCT.name AS name, CATEGORY.name AS category, MARK.name AS mark, PRODUCT.price 
                AS price FROM PRODUCT INNER JOIN CATEGORY ON PRODUCT.category = CATEGORY.id_category 
                INNER JOIN MARK ON PRODUCT.mark = MARK.id_mark WHERE id_product=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_product]);
        $product = $stmt->fetch();
        return $product;
    }

    public function viewAllProduct(){
        $sql = "SELECT id_product AS id, PRODUCT.name AS name, CATEGORY.name AS category, MARK.name AS mark, PRODUCT.price 
                AS price, PHOTO.name AS photo FROM PRODUCT 
                INNER JOIN CATEGORY ON PRODUCT.category = CATEGORY.id_category 
                INNER JOIN MARK ON PRODUCT.mark = MARK.id_mark RIGHT JOIN PHOTO ON PRODUCT.id_product = PHOTO.product 
                ORDER BY id_product";
        $stmt = $this->pdo->query($sql);
        $product = $stmt->fetchAll();
        return $product;
    }

    public function LastIdProduct(){
        $sql=  "SELECT MAX(id_product) FROM PRODUCT";
        $stmt = $this->pdo->query($sql);
        $product = $stmt->fetch();
        return $product;
    }
    public function delete($id){
        $sql = "DELETE FROM PRODUCT WHERE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

}
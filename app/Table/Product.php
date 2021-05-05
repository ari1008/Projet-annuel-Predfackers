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
        $sql = "SELECT id_product AS id, PRODUCT.name AS name, CATEGORY.name AS category, CATEGORY.photo AS cphoto, MARK.name AS mark, MARK.photo AS mphoto, PRODUCT.price 
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
    public function deleteID($id){
        $sql = "DELETE FROM PRODUCT WHERE id_product=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function viewProductNonValidate(){
        $sql = "SELECT id_product AS id, PRODUCT.name AS name, CATEGORY.name AS category, MARK.name AS mark, PRODUCT.price 
        AS price, PHOTO.name AS PHOTO FROM `PRODUCT` LEFT JOIN CATEGORY ON PRODUCT.category = CATEGORY.id_category LEFT JOIN 
        MARK ON PRODUCT.mark = MARK.id_mark LEFT JOIN PHOTO ON PRODUCT.id_product = PHOTO.product 
        WHERE validate=0 ORDER BY PRODUCT.id_product =0";
        $q = "";
        $stmt = $this->pdo->query($sql);
        $product = $stmt->fetchAll();
        return $product;
    }

    public function addDate($id){

        $sql = 'UPDATE PRODUCT SET  date_start=? WHERE id_product = ?';
        $date = date("Y-m-d"); //2021-05-06

        var_dump($date);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $date, $id]);
        return $date;
    }

}
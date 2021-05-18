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
        $stmt = $this->pdo->query($sql);
        $product = $stmt->fetchAll();
        return $product;
    }

    public function addDate($id){

        $sql = 'UPDATE PRODUCT SET  date_start=? WHERE id_product = ?';
        $date = date("Y-m-d"); //2021-05-06
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $date, $id]);
        return $date;
    }

    public function viewIdUser($id_product){
        $q = "SELECT userpropose FROM PRODUCT WHERE  id_product=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_product]);
        $user = $stmt->fetch();
        return $user;
    }

    public function productPrice($id_product){
        $q = "SELECT price  FROM PRODUCT WHERE  id_product=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_product]);
        $price = $stmt->fetch();
        return $price;
    }

    public function productNewPrice($id_user){
            $sql = "SELECT id_verification AS id, PRODUCT.name AS name, CATEGORY.name AS category, 
                    MARK.name AS mark, newprice AS price FROM VERIFACTION LEFT JOIN PRODUCT ON  
                PRODUCT.id_product = VERIFACTION.product LEFT JOIN USER ON USER.id_user = PRODUCT.userpropose 
                LEFT JOIN MARK ON  MARK.id_mark = PRODUCT.mark  LEFT JOIN CATEGORY ON CATEGORY.id_category = PRODUCT.category
                WHERE VERIFACTION.validate = 3  AND USER.id_user=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id_user]);
            $product = $stmt->fetchAll();
            return $product;
    }

    public function prodCountCatMak($id_mark,$id_category){
        $sql = "SELECT COUNT(VERIFACTION.id_verification ) as count FROM VERIFACTION  
                LEFT JOIN PRODUCT ON PRODUCT.id_product= VERIFACTION.id_verification 
                WHERE VERIFACTION.validate = 3 AND PRODUCT.category=? AND PRODUCT.mark=?  ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_mark,$id_category]);
        $product = $stmt->fetch();
        return $product;

    }

    public function prodNewPrice($id_category,$id_mark){
        $sql = "SELECT id_verification AS id, PRODUCT.name AS name, newprice AS price,  PRODUCT.description AS description
                FROM VERIFACTION LEFT JOIN PRODUCT ON  
                PRODUCT.id_product = VERIFACTION.product LEFT JOIN USER ON USER.id_user = PRODUCT.userpropose 
                LEFT JOIN MARK ON  MARK.id_mark = PRODUCT.mark  LEFT JOIN CATEGORY ON CATEGORY.id_category = PRODUCT.category
                WHERE PRODUCT.category=? AND  PRODUCT.mark=? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_category,$id_mark]);
        $product = $stmt->fetchAll();
        return $product;
    }
}
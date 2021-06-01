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

    public function viewProdutNewPrice($id_product){
            $sql = "SELECT id_verification AS id, PRODUCT.name AS name, CATEGORY.name AS category, MARK.name AS mark, 
            newprice AS price FROM VERIFACTION LEFT JOIN PRODUCT ON PRODUCT.id_product = VERIFACTION.product 
            LEFT JOIN USER ON USER.id_user = PRODUCT.userpropose LEFT JOIN MARK ON MARK.id_mark = PRODUCT.mark 
            LEFT JOIN CATEGORY ON CATEGORY.id_category = PRODUCT.category WHERE VERIFACTION.id_verification =?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id_product]);
            $product = $stmt->fetch();
            return $product;
    }

    public function constructPayment($id_product){
        $sql = "SELECT PRODUCT.name AS name,PRODUCT.description AS description, VERIFACTION.newprice AS price  FROM VERIFACTION LEFT JOIN PRODUCT 
            ON PRODUCT.id_product = VERIFACTION.product WHERE VERIFACTION.id_verification = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_product]);
        $product = $stmt->fetch();
        return $product;
    }

    public function update($id_product, $validate){
        $sql = "UPDATE VERIFACTION SET validate=? WHERE VERIFACTION.id_verification = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$validate,$id_product]);
    }
    public function viewVerificationNewPrice($id_product){
        $sql = "SELECT id_product AS id, PRODUCT.name AS name, CATEGORY.name AS category, MARK.name AS mark, 
            newprice AS price, PHOTO.name AS photo, PRODUCT.description AS description FROM VERIFACTION LEFT JOIN PRODUCT ON PRODUCT.id_product = VERIFACTION.product 
            LEFT JOIN MARK ON MARK.id_mark = PRODUCT.mark LEFT JOIN PHOTO ON PHOTO.product=PRODUCT.id_product
            LEFT JOIN CATEGORY ON CATEGORY.id_category = PRODUCT.category WHERE PRODUCT.id_product=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_product]);
        $product = $stmt->fetch();
        return $product;
    }
    public function buyProduct($id_product){
        $sql = "UPDATE VERIFACTION LEFT JOIN PRODUCT ON PRODUCT.id_product = VERIFACTION.product SET  
        VERIFACTION.validate=5, PRODUCT.validate=3 WHERE VERIFACTION.id_verification = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_product]);

    }

}
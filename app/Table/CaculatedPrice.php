<?php


namespace APP\Table;
use APP\Database;
use \PDO;

class CaculatedPrice extends Database {
    public function viewCaculatedPriceAll(){
        $q = "SELECT id_calculatedprice AS id, CALCULATEDPRICE.name AS name, CATEGORY.name AS category, MARK.name AS mark, 
                CALCULATEDPRICE.price AS price FROM CALCULATEDPRICE LEFT JOIN CATEGORY ON 
                CALCULATEDPRICE.category = CATEGORY.id_category LEFT JOIN MARK ON CALCULATEDPRICE.mark = MARK.id_mark
                ORDER BY id_calculatedprice";
        $stmt = $this->pdo->query($q);
        $calculed = $stmt->fetchAll();
        return $calculed;
    }

    public function viewCalculatedPrice($id_calculatedprice){
        $q = "SELECT id_calculatedprice AS id, CALCULATEDPRICE.name AS name, CATEGORY.name AS category, MARK.name AS mark, 
                CALCULATEDPRICE.price AS price FROM CALCULATEDPRICE LEFT JOIN CATEGORY ON 
                CALCULATEDPRICE.category = CATEGORY.id_category LEFT JOIN MARK ON CALCULATEDPRICE.mark = MARK.id_mark 
                WHERE id_calculatedprice=? ";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_calculatedprice]);
        $calculatedPrice = $stmt->fetch();
        return $calculatedPrice;

    }

    public function viewMarkAVG($id_mark){
        $sql = "SELECT AVG(price) AS priceMark FROM CALCULATEDPRICE WHERE mark=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_mark]);
        $calculatedPrice = $stmt->fetch();
        return $calculatedPrice;
    }

    public function viewCategoryAVG($id_category){
        $sql = "SELECT AVG(price) AS priceCat FROM CALCULATEDPRICE WHERE category=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_category]);
        $calculatedPrice = $stmt->fetch();
        return $calculatedPrice;
    }
}
<?php


namespace app\Table;
use \PDO;
use APP\Database;

class Association extends Database{

    public function __construct() {
        parent::__construct();
        $this->getPdo();
    }

    public function ViewAssociationAll(){
        $q = "SELECT id_association, photo, name, description FROM ASSOCIATION ORDER BY id_association";
        $stmt = $this->pdo->query($q);
        $association = $stmt->fetchAll();
        return $association;
    }

    public function ViewAssociation($id_association){
        $q = "SELECT photo, name, description FROM ASSOCIATION WHERE id_association=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_association]);
        $association = $stmt->fetch();
        return $association;
    }

    public function selectName($id_association){
        $q = "SELECT name FROM ASSOCIATION WHERE id_association=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_association]);
        $association = $stmt->fetch();
        return $association;
    }

    public function selectNameDescription($id_association){
        $q = "SELECT name, description FROM ASSOCIATION WHERE id_association=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_association]);
        $association = $stmt->fetch();
        return $association;
    }


    public function association($id_association){
        $q = "SELECT id_association AS association, name FROM ASSOCIATION
            WHERE ASSOCIATION.id_association=? ";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_association]);
        $association = $stmt->fetch();
        return $association;
    }

    public function updateAssociation($id_association, $photo, $name, $description) {
        $q = "UPDATE ASSOCIATION set photo=?, name=?, description=? WHERE ASSOCIATION.id_association=?";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$photo, $name, $description, $id_association]);
    }

    public function deleteAssociation($id_association){
        $q = "DELETE FROM ASSOCIATION WHERE ASSOCIATION.id_association=? ";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$id_association]);
    }

    public function createAssociation($name, $photo, $description) {
        $q = "INSERT INTO ASSOCIATION (name, photo, description, validate) VALUES (?, ?, ?, 1)";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$name, $photo, $description]);

    }
}
<?php


namespace app\Table;
use \PDO;
use APP\Database;

class Action{
    public function viewActionAll(){
        $q = "SELECT id_action AS id, ACTION.name AS name, ACTION.photo AS photo, ACTION.description AS description, PROJECT.name 
                AS project, ASSOCIATION.name AS association FROM ACTION LEFT JOIN PROJECT ON ACTION.project = PROJECT.id_project 
                LEFT JOIN ASSOCIATION ON PROJECT.association = ASSOCIATION.id_association ORDER BY id_action";
        $stmt = $this->pdo->query($q);
        $actionAll = $stmt->fetchAll();
        return $actionAll;
    }

    public function viewAction($id_action){
        $q = "SELECT id_action AS id, ACTION.name AS name, ACTION.photo AS photo, ACTION.description AS description, PROJECT.name 
                AS project, ASSOCIATION.name AS association FROM ACTION LEFT JOIN PROJECT ON ACTION.project = PROJECT.id_project 
                LEFT JOIN ASSOCIATION ON PROJECT.association = ASSOCIATION.id_association WHERE id_action=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_action]);
        $action = $stmt->fetch();
        return $action;
    }


}
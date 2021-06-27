<?php


namespace app\Table;
use \PDO;
use APP\Database;

class Project extends Database{

    public function __construct() {
        parent::__construct();
        $this->getPdo();
    }

    public function ViewProjectAll(){
        $q = "SELECT id_project, association, name, description, photo FROM PROJECT ORDER BY id_project";
        $stmt = $this->pdo->query($q);
        $project = $stmt->fetchAll();
        return $project;
    }

    public function ViewProject($id_project){
        $q = "SELECT association, name, description, photo FROM PROJECT WHERE id_project=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_project]);
        $project = $stmt->fetch();
        return $project;
    }

    public function selectName($id_project){
        $q = "SELECT name FROM PROJECT WHERE id_project=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_project]);
        $project = $stmt->fetch();
        return $project;
    }

    public function selectNameDescription($id_project){
        $q = "SELECT name, description FROM PROJECT WHERE id_project=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_project]);
        $project = $stmt->fetch();
        return $project;
    }


    public function project($id_project){
        $q = "SELECT id_project AS project, name FROM PROJECT
            WHERE PROJECT.id_project=? ";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_project]);
        $project = $stmt->fetch();
        return $project;
    }

    public function updateProject($id_project, $association, $name, $description, $photo) {
        $q = "UPDATE PROJECT set association=?, name=?, description=?, photo=? WHERE PROJECT.id_project=?";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$association, $name, $description, $photo, $id_project]);
    }

    public function deleteProject($id_project){
        $q = "DELETE FROM PROJECT WHERE PROJECT.id_project=? ";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$id_project]);
    }

    public function createProject($association, $name, $description, $photo) {
        $q = "INSERT INTO PROJECT (association, name, description, photo) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$association, $name, $description, $photo]);

    }
}
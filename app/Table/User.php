<?php
namespace APP\Table;
use APP\Database;
use \PDO;

class User extends Database{

    public function ViewUserAll(){
        $q = "SELECT id_user, last_name, first_name, email, username, type FROM USER ORDER BY id_user";
        $stmt = $this->pdo->query($q);
        $user = $stmt->fetchAll();
        return $user;
    }

    public function ViewUser($id_user){
        $q = "SELECT  photo, last_name, first_name, email, username, date_birth, password, language, 
           association, validate, type FROM USER WHERE  id_user=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_user]);
        $user = $stmt->fetch();
        return $user;
    }

}


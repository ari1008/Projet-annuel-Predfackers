<?php
namespace APP\Table;
use APP\Database;
use \PDO;

class User extends Database{

    public function __construct() {
        parent::__construct();
        $this->getPdo();
    }

    public function ViewUserAll(){
        $q = "SELECT id_user, last_name, first_name, email, username, date_birth, type FROM USER ORDER BY id_user";
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

    public function selectNameLast($id_user){
        $q = "SELECT last_name, first_name FROM USER WHERE  id_user=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_user]);
        $user = $stmt->fetch();
        return $user;
    }

    public function selectNameEmail($id_user){
        $q = "SELECT last_name, first_name, email FROM USER WHERE  id_user=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_user]);
        $user = $stmt->fetch();
        return $user;
    }

    public function send($id_user){
        $q = "SELECT ADDRESS.id_address AS address, PRODUCT.warehouse AS warehouse FROM USER LEFT JOIN
            PRODUCT ON PRODUCT.userpropose = USER.id_user LEFT JOIN ADDRESS ON ADDRESS.user = USER.id_user
            WHERE USER.id_user=? ";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_user]);
        $user = $stmt->fetch();
        return $user;
    }

    public function user($id_user){
        $q = "SELECT id_user AS id, email FROM USER
            WHERE USER.id_user=? ";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_user]);
        $user = $stmt->fetch();
        return $user;
    }

    public function updateUser($id_user, $last_name, $first_name, $email, $username, $date_birth, $password) {
        $q = "UPDATE USER set last_name=?, first_name=?, email=?, username=?, date_birth=?, password=? WHERE USER.id_user=?";
        $stmt = $this->pdo->prepare($q);
        return $stmt->execute([$last_name, $first_name, $email, $username, $date_birth, $password, $id_user]);
    }

    public function deleteUser($id_user){
            $q = "DELETE FROM USER WHERE USER.id_user=? ";
            $stmt = $this->pdo->prepare($q);
            return $stmt->execute([$id_user]);
    }

}


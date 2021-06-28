<?php
namespace app\Table;
use \PDO;
use APP\Database;


class Token extends Database{

    public function insertToken($id_user, $nbrToken){
        var_dump($nbrToken);
        var_dump($id_user);
        $sql = "Insert Into TOKEN(user, number) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_user, $nbrToken]);

    }

}
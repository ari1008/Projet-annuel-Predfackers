<?php


namespace app\Table;
use \PDO;

use APP\Database;

class Mark extends Database{
    public function ViewMarkAll(){
        $q = "SELECT id_mark AS id, name , photo FROM MARK ORDER BY id_mark";
        $stmt = $this->pdo->query($q);
        $markAll = $stmt->fetchAll();
        return $markAll;
    }

    public function ViewMark($id_mark){
        $q = "SELECT id_mark, name, photo FROM MARK WHERE id_mark=?";
        $stmt = $this->pdo->prepare($q);
        $stmt->execute([$id_mark]);
        $mark = $stmt->fetch();
        return $mark;
    }

    public function addMark($name,$photo){
        $sql = "INSERT INTO MARK (name, photo) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $mark = $stmt->execute([$name,$photo]);
        return $mark;
    }

    public function deleteMark($id_mark){
        $sql = "DELETE FROM MARK WHERE id_mark=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_mark]);
    }

    public function markId(){
        $sql = "SELECT id_mark AS id, name FROM MARK ORDER BY id_mark";
        $stmt = $this->pdo->query($sql);
        $mark = $stmt->fetchAll();
        return $mark;
    }


}
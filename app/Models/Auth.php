<?php
namespace APP\Models;

use APP\Database;

class Auth{
    public $email;
    public $username=null;
    private $database;

    /*
     * function du constructeur qui permet de ce mettre en mode enregistrement et ce connecté
     */
     public function __construct($email,$password,Database $database, $username=null){
         $this->username=$username;
         $this->email=$email;
         $this->database=$database;
         if ($username!=Null){
             $tab = [ "email"=> $this->email,
                 "username" => $this->username
             ];
             $operator[]="OR";
             $this->database->getPdo();
             $test = $this->database->selectOneAll("USER", $tab, $operator);
             if($test == false){
                 $this->registration($password);
             }else{
                 header('location: index.php');
                 exit();
             }

         }else{
             $this->identification($password);
         }

     }

     /*
      * Elle nous permet de nous enregistrer
      */
     protected function registration($password){
         $password = password_hash($password,PASSWORD_DEFAULT);
         $tab = [ "email"=> $this->email,
             "username"=> $this->username,
             "password"=> $password,
             "type"=> "1"
         ];
         $this->database->getPdo();
         $test = $this->database->insert("USER",$tab);
         return $test;
     }

     /*
      * function qui nous permet de retourner l'utilisateur dans une autre routeur si il est bien connecté
      * elle retourné dans le header admin.php, client.php, testeur.php
      *  Permet de vérifier et de mettre dans la superGlobal $_SESSION l'id, le type
      */
     protected function identification ($password)
     {
         $this->database->getPdo();
         $test = $this->database->SelectUser($this->email);
         if ($test != false) {
             if (password_verify($password, $test["password"])) {
                    if($test["type"]==0){
                            $_SESSION['id'] = $test['id_user'];
                            $_SESSION['type'] ="0";
                            header('location: admin.php ');
                            exit();

                    }else if($test["type"]==1){
                        $_SESSION['id'] = $test['id_user'];
                        $_SESSION['type'] = "1";
                        header('location: client.php');
                        exit();
                    }else if($test["type"]==2){
                        $_SESSION['id'] = $test['id_user'];
                        $_SESSION['type'] = "2";
                        header('location: testeur.php');
                        exit();
                    }
             }
         }
     }



}
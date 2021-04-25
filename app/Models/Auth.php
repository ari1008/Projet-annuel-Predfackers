<?php
namespace APP\Models;

use APP\Database;

class Auth{
    public $email;
    public $username=null;
    private $database;


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
                    }
             }
         }
     }



}
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
             $this->registration($password);
         }else{
             $this->identification($password);
         }

     }

     protected function registration($password){
         $password = password_hash($password,PASSWORD_DEFAULT);
         $tab = [ "email"=> $this->email,
             "username"=> $this->username,
             "password"=> $password
         ];
         $this->database->getPdo();
         $test = $this->database->insert("USER",$tab);
     }

     protected function identification ($password){
         $password = password_hash($password,PASSWORD_DEFAULT);
         $tab = [ "email"=> $this->email,
             "password"=> $password
         ];
         $this->database->getPdo();
         //$this->database->insert("USER",$tab);

     }



}
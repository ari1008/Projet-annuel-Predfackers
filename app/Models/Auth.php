<?php
namespace APP\Models;

class Auth{
     public function __construct($name,$password,$pdo ){
         echo $name;
         echo $password;
         print_r($pdo);
     }

}
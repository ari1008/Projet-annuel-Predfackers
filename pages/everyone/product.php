<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \APP\Bootstrap\Card;
use \APP\Bootstrap\Cardpay;


if(isset($_GET["mark"]) AND isset($_GET["category"]) AND empty($_GET["id"])){
    $mark = $_GET["mark"]!="mark" ? $_GET["mark"] :  3 ;
    $category = $_GET["category"]!="category" ? $_GET["category"] :  2 ;
    $url = "index.php?p=connect";
    $test = new Card($category, $mark, $url);
}elseif (isset($_GET["mark"]) AND isset($_GET["category"]) AND isset($_GET["id"])){
    $mark = $_GET["mark"]!="mark" ? $_GET["mark"] :  3 ;
    $category = $_GET["category"]!="category" ? $_GET["category"] :  2 ;
    $url = "client.php?p=product";
    $test = new Cardpay($category, $mark, $url,$_GET["id"] );

}
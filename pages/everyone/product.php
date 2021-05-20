<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \APP\Bootstrap\Card;

$mark = $_GET["mark"]!="mark" ? $_GET["mark"] :  3 ;
$category = $_GET["category"]!="category" ? $_GET["category"] :  2 ;
$url = "index.php?p=connect";
$test = new Card($category, $mark, $url);
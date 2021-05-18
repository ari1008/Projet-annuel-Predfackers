<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \APP\Bootstrap\Card;

$mark = $_GET["mark"]!="mark" ? $_GET["mark"] :  null ;
$category = $_GET["category"]!="category" ? $_GET["category"] :  null ;
$test = new Card($category, $mark);
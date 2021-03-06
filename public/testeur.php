<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use APP\Autoloader;
session_start();
define('ROOT_FOLDER', realpath(__DIR__ . '/../'));
require ROOT_FOLDER . '/app/Autoloader.php';
Autoloader::register();
/*if($_SESSION["type"]!==2){
    header('Location: index.php?p=connect');
    exit();
}*/
define('ROOT', dirname(__DIR__));
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}
$content = "";
ob_start();
if ($page === 'home') {
    require ROOT_FOLDER . "/pages/testeur/home.php";
}elseif ($page === 'validateProduct'){
    require ROOT_FOLDER . "/pages/testeur/validateProduct.php";
}elseif ($page === "deco"){
    require  ROOT_FOLDER . "/pages/post/deco.php";
}elseif ($page === "viewProduct"){
    require  ROOT_FOLDER . "/pages/testeur/viewProduct.php";
}elseif ($page === "form"){
    require  ROOT_FOLDER . "/pages/testeur/form.php";
}elseif ($page === "newPrice"){
    require  ROOT_FOLDER . "/pages/testeur/newPrice.php";
}

$content = $content . ob_get_clean();
require ROOT_FOLDER . '/pages/templates/testeur.php';

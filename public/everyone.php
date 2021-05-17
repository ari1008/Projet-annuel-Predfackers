<?php
use APP\Autoloader;
session_start();
define('ROOT_FOLDER', realpath(__DIR__ . '/../'));
require ROOT_FOLDER . '/app/Autoloader.php';
Autoloader::register();

define('ROOT', dirname(__DIR__));
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}

if ($page = "product"){
  require_once  ROOT_FOLDER . "/pages/everyone/product.php";
}else if($page = "home"){
    echo "oupsi";
}

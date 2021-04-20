<?php
session_start();
use APP\Autoloader;

define('ROOT_FOLDER', realpath(__DIR__ . '/../'));
require ROOT_FOLDER . '/app/Autoloader.php';
Autoloader::register();

define('ROOT', dirname(__DIR__));
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}

ob_start();
if ($page === 'home') {
    require ROOT_FOLDER . "/pages/client/home.php";
}elseif ($page === 'deco') {
    require ROOT_FOLDER . "/pages/post/deco.php";
}elseif ($page === 'product') {
    require ROOT_FOLDER . "/pages/client/product.php";
}elseif ($page === 'addProduct') {
    require ROOT_FOLDER . "/pages/client/addProduct.php";
}elseif ($page === 'verificationProduct') {
    require ROOT_FOLDER . "/pages/client/verificationProduct.php";
}
$content = ob_get_clean();
require ROOT_FOLDER . '/pages/templates/client.php';
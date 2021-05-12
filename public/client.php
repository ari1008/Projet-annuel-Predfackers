<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
$content = "";
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
}elseif ($page == "card"){
    require ROOT_FOLDER .  "/pages/client/card.php";
}elseif ($page == "validateProduct"){
    require ROOT_FOLDER .  "/pages/client/validateProduct.php";
}elseif ($page == "noValidateProduct"){
    require ROOT_FOLDER .  "/pages/client/noValidateProduct.php";
}elseif ($page == "viewProductWait"){
    require ROOT_FOLDER .  "/pages/client/viewProductWait.php";
}elseif ($page == "viewProductOne"){
    require ROOT_FOLDER .  "/pages/client/viewProductOne.php";
}elseif ($page == "viewProductOne"){
    require ROOT_FOLDER .  "/pages/client/viewProductOne.php";
}elseif ($page == "payment"){
    require ROOT_FOLDER .  "/pages/client/payment.php";
}elseif ($page == "testingPayment"){
    require ROOT_FOLDER .  "/pages/client/testingPayment.php";
}elseif ($page == "success"){
    require ROOT_FOLDER . "/pages/client/success.php";
}
$content = $content . ob_get_clean();
require ROOT_FOLDER . '/pages/templates/client.php';
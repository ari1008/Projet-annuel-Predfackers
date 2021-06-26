<?php
session_start();
use APP\Autoloader;

define('ROOT_FOLDER', realpath(__DIR__ . '/../'));
require ROOT_FOLDER.'/app/Autoloader.php';
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
    require ROOT_FOLDER . "/pages/post/home.php";
}elseif ($page === 'connect'){
    require ROOT_FOLDER . "/pages/post/connect.php";
}elseif ($page === 'register'){
    require ROOT_FOLDER . "/pages/post/registration.php";
}elseif ($page === 'list_users'){
    require ROOT_FOLDER . "/pages/post/list_users.php";
}elseif ($page === 'editUser'){
    require ROOT_FOLDER . "/pages/post/editUser.php";
}elseif ($page === 'deleteUser'){
    require ROOT_FOLDER . "/pages/post/deleteUser.php";
}elseif ($page === 'verification'){
    require ROOT_FOLDER . "/pages/post/verification.php";
}elseif ($page === 'list_users'){
    require ROOT_FOLDER . "/pages/post/list_users.php";
}elseif ($page === 'editUser'){
    require ROOT_FOLDER . "/pages/post/editUser.php";
}elseif ($page === 'deleteUser'){
    require ROOT_FOLDER . "/pages/post/deleteUser.php";
}elseif ($page === 'testPdf'){
    require ROOT_FOLDER . "/pages/post/testPdf.php";
}elseif ($page === 'product'){
    require ROOT_FOLDER . "/pages/post/product.php";
}elseif ($page === "onepush"){
    require ROOT_FOLDER . "/pages/post/onepush.php";
}
$content = $content . ob_get_clean();
require ROOT_FOLDER . '/pages/templates/default.php';
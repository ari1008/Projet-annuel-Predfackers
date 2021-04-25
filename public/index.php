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

ob_start();
if ($page === 'home') {
    require ROOT_FOLDER . "/pages/post/home.php";
}elseif ($page === 'connect'){
    require ROOT_FOLDER . "/pages/post/connect.php";
}elseif ($page === 'register'){
    require ROOT_FOLDER . "/pages/post/registration.php";
}elseif ($page === 'verification'){
    require ROOT_FOLDER . "/pages/post/verification.php";
}
$content = ob_get_clean();
require ROOT_FOLDER . '/pages/templates/default.php';
<?php

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
    require ROOT_FOLDER . "/pages/admin/home.php";
}elseif ($page === 'productAdd'){
    require ROOT_FOLDER . "/pages/admin/productAdd.php";
}elseif ($page === 'user'){
    require ROOT_FOLDER . "/pages/admin/user.php";
}elseif ($page === 'deco'){
    require ROOT_FOLDER . "/pages/post/deco.php";
}elseif ($page === 'viewUser'){
    require ROOT_FOLDER . "/pages/admin/viewUser.php";
}elseif ($page === 'categoryAdd'){
    require ROOT_FOLDER . "/pages/admin/categoryAdd.php";
}elseif ($page === 'product'){
    require ROOT_FOLDER . "/pages/admin/product.php";
}elseif ($page === 'category'){
    require ROOT_FOLDER . "/pages/admin/category.php";
}

$content = ob_get_clean();
require ROOT_FOLDER . '/pages/templates/admin.php';
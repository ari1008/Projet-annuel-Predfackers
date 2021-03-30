<?php
use APP\Autoloader;

use App\Bootstrap\Form;


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
    require ROOT . "/pages/post/home.php";
}elseif ($page === 'connect'){
    require ROOT . "/pages/post/connect.php";
}
$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';
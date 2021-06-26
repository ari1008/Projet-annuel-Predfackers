<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use APP\Table\User;

$user_table = new User();

if (isset($_GET['user_id'])) {
    $user_table->deleteUser($_GET['user_id']);
}
header('Location: ?p=list_users');
?>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use APP\Table\Association;

$association_table = new Association();

if (isset($_GET['association_id'])) {
    $association_table->deleteAssociation($_GET['association_id']);
}
header('Location: ?p=list_associations');
?>


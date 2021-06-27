<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use APP\Table\Project;

$project_table = new Project();

if (isset($_GET['project_id'])) {
    $project_table->deleteProject($_GET['project_id']);
}
header('Location: ?p=list_projects');

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use APP\Table\Project;
$project_table = new Project();
$projects = $project_table->ViewProjectAll();
$column_name = array("Id", "Association", "Nom", "Description", "Photo");
?>

<a class="btn btn-primary btn-sm" href="<?php echo '?p=createProject'; ?>">Nouveau Projet</a>
<table border="1" class="table table-bordered">
    <thead>
    <tr>
        <?php foreach ($column_name as $column): ?>
            <th><?php echo $column; ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($projects as $project): ?>
        <tr>
            <td><a class="btn btn-primary" href="<?php echo '?p=editProject&project_id='.$project['id_project']; ?>"><?php echo $project['id_project']; ?></a></td>
            <td><?php echo $project['association']; ?></td>
            <td><?php echo $project['name']; ?></td>
            <td><?php echo $project['description']; ?></td>
            <td><?php echo $project['photo']; ?></td>
            <td><a class="btn btn-primary" href="<?php echo '?p=deleteProject&project_id='.$project['id_project']; ?>">Suppprimer</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>

</table>
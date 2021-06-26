<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use APP\Table\Association;
$association_table = new Association();
$associations = $association_table->ViewAssociationAll();
$column_name = array("Id", "Photo", "Nom", "Description");
?>

<table border="1">
    <thead>
    <tr>
        <?php foreach ($column_name as $column): ?>
            <th><?php echo $column; ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($associations as $association): ?>
        <a href="<?php echo '?p=createAssociation&association_id='.$association['id_association']; ?>">Nouvelle Association</a>
        <tr>
            <td><a href="<?php echo '?p=editAssociation&association_id='.$association['id_association']; ?>"><?php echo $association['id_association']; ?></a></td>
            <td><?php echo $association['photo']; ?></td>
            <td><?php echo $association['name']; ?></td>
            <td><?php echo $association['description']; ?></td>
            <td><a href="<?php echo '?p=deleteAssociation&association_id='.$association['id_association']; ?>">Suppprimer</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>

</table>

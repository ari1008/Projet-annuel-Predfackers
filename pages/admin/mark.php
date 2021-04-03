<?php
use APP\Table\User;
$user =  new User();
$user->getPdo();
$results = $user->ViewUserAll();
?>
<div class="container overflow-hidden">
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><?php echo gettext("Id")?></th>
        <th><?php echo gettext("Marque")?></th>
        <th><?php echo gettext("Photo")?></th>
        <th><?php echo gettext("Action")?></th>
    </tr>
    </thead>

    <?php
    foreach ($results as $key => $value) { ?>
    <tr>
        <td> <?php echo $value['id_state'] ?> </td>
        <td> <?php echo $value['name'] ?> </td>
        <td> <?php echo $value['photo'] ?> </td>

        <td width="200">
            <?php	echo '<a href="?p=viewMark&mark=' . $value['id_mark'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
            ?>
            <?php	echo '<a href="?p=deleteMark&mark=' . $value['id_mark'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
            ?>
        </td>
    </tr>
<?php } ?>
</table>
</div>

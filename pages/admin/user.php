<?php
use APP\Table\User;
$user =  new User();
$user->getPdo();
$results = $user->ViewUserAll();
?>
<a href="?p=userAdd" class="btn btn-primary btn-lg"  role="button" ><?php echo gettext("Ajoutez des Utilisateurs admin");?></a>
<div class="container overflow-hidden">
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><?php echo gettext("Id")?></th>
        <th><?php echo gettext("Prénom")?></th>
        <th><?php echo gettext("Nom")?></th>
        <th><?php echo gettext("Username")?></th>
        <th><?php echo gettext("Email")?></th>
        <th><?php echo gettext("type")?></th>
        <th><?php echo gettext("Action")?></th>
    </tr>
    </thead>

    <?php
    foreach ($results as $key => $value) { ?>
    <tr>
        <td> <?php echo $value['id_user'] ?> </td>
        <td> <?php echo $value['last_name'] ?> </td>
        <td> <?php echo $value['first_name'] ?> </td>
        <td> <?php echo $value['username'] ?> </td>
        <td> <?php echo $value['email'] ?> </td>
        <td> <?php echo $value['type'] == 1 ? gettext("client") : gettext("admin") ?> </td>


        <td width="200">
            <?php	echo '<a href="?p=viewUser&user=' . $value['id_user'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
            ?>

            <?php	echo '<a href="?p=deleteUSER&user=' . $value['id_user'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
            ?>
        </td>
    </tr>
<?php } ?>
</table>
</div>

<?php
use APP\Table\Mark;
$mark =  new Mark();
$mark->getPdo();
$results = $mark->ViewMarkAll();
?>
<a href="?p=markAdd" class="btn btn-primary btn-lg"  role="button" ><?php echo gettext("Ajoutez des marques");?></a>
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
        <td> <?php echo $value['id'] ?> </td>
        <td> <?php echo $value['name'] ?> </td>
        <td> <img src="/Projet-annuel-Predfackers/public/pictures/mark/<?php echo  $value['photo'] ?>" class="rounded mx-auto d-block" height="100" width="100" alt="..."> </td>

        <td width="200">
            <?php	echo '<a href="?p=modifyMark&mark=' . $value['id'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> MODIFIER</a>'
            ?><?php	echo '<a href="?p=deleteMark&mark=' . $value['id'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
            ?>
        </td>
    </tr>
<?php } ?>
</table>
    <?php
    if ($results == null){
        echo gettext("Vous avez pas encore mis de marque");
    }
    ?>
</div>

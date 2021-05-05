<?php

use APP\Table\Category;
$category =  new Category();
$category->getPdo();
$results = $category->ViewCategoryAll();
?>
<a href="?p=categoryAdd" class="btn btn-primary btn-lg"  role="button" ><?php echo gettext("Ajoutez des categories");?></a>
<div class="container overflow-hidden">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><?php echo gettext("Id")?></th>
            <th><?php echo gettext("Nom")?></th>
            <th><?php echo gettext("Photo")?></th>
            <th><?php echo gettext("Action")?></th>
        </tr>
        </thead>

        <?php
        foreach ($results as $key => $value) { ?>
            <tr>
                <td> <?php echo $value['id_category'] ?> </td>
                <td> <?php echo $value['name'] ?> </td>
                <td> <?php echo $value['photo'] ?> </td>
                <td> <?php echo $value['username'] ?> </td>

                <td width="200">
                    <?php	echo '<a href="?p=viewCategory&category=' . $value['id_category'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
                    ?>

                    <?php	echo '<a href="?p=deleteCategory&category=' . $value['id_category'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php if($results == null){
    echo gettext("Il n'y a pas encore de categorie");
    }?>
</div>

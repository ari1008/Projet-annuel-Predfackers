<?php

use APP\Table\Product;
$product =  new Product();
$product->getPdo();
$results = $product->productNewPrice($_SESSION['id']);


?>
<div class="container overflow-hidden">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><?php echo gettext("Id")?></th>
            <th><?php echo gettext("Nom")?></th>
            <th><?php echo gettext("Catégorie")?></th>
            <th><?php echo gettext("Marque")?></th>
            <th><?php echo gettext("Prix")?></th>
            <th><?php echo gettext("Action")?></th>
        </tr>
        </thead>

        <?php
        foreach ($results as $key => $value) { ?>
            <tr>
                <td> <?php echo $value['id'] ?> </td>
                <td> <?php echo $value['name'] ?> </td>
                <td> <?php echo $value['category'] ?> </td>
                <td> <?php echo $value['mark'] ?> </td>
                <td> <?php echo $value['price'] ?> </td>

                <td width="200">
                    <?php	echo '<a href="?p=viewProductOne&product=' . $value['id'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
                    ?>

                </td>
            </tr>
        <?php } ?>
    </table>
    <?php if($results == null){
        echo gettext("Il n'y a pas encore de produit non valider");
    }?>
</div>
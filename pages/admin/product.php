<?php
use APP\Table\CaculatedPrice;
$calulated =  new CaculatedPrice();
$calulated->getPdo();
$results = $calulated->viewCaculatedPriceAll();
var_dump($results);
?>
<a href="?p=productAdd" class="btn btn-primary btn-lg"  role="button" ><?php echo gettext("Ajoutez des Produits");?></a>
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
                    <?php	echo '<a href="?p=viewProduct&product=' . $value['id'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
                    ?>

                    <?php	echo '<a href="?p=deleteProduct&product=' . $value['id'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php if($results == null){
        echo gettext("Il n'y a pas encore de produit");
    }?>
</div>

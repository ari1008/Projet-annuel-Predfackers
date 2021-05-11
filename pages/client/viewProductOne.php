<?php
use \APP\Table\Verification;
$product =  new Verification();
$product->getPdo();
$results = $product->viewProdutNewPrice($_GET["product"]);
?>
<div class="container admin">
    <div class="row">
        <div class="col-md-6">
            <h1><strong><?php echo gettext("Produit en attente");?></strong></h1><br>
            <form>
                <div class="form-group">
                    <label>Id: </label> <?php echo ' ' . $results['id'] ?>
                </div>

                <div class="form-group">
                    <label>Catégorie: </label> <?php echo ' ' . $results["category"] ?>
                </div>

                <div class="form-group">
                    <label>Marque : </label><?php echo ' ' . $results["mark"] ?>
                </div>
                <div class="form-group">
                    <label>Price :</label><?php echo ' ' . $results ["price"] ?>
                </div>

            </form>
            <div class="form-action">
                <a href="?p=user" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                <?php echo '<a href="?p=paymentAugmented&product=' . $results['id'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Refuser Renvoie</a>'?>
                <?php echo '<a href="?p=payment&product=' . $results['id'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Payer</a>'?>
                <?php echo '<a href="?p=destruction&product=' . $results['id'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Destruction</a>'?>
            </div>
        </div>

    </div>



</div>

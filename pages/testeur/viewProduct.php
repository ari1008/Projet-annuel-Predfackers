<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use APP\Table\Product;
$id = $_GET["product"];
$product =  new Product();
$product->getPdo();
$results = $product->ViewProduct($id);
$date =$product->addDate($id);



?>
<h1 class="titre">Produit</h1>
<div class="container admin">
    <div class="row">
        <div class="col-md-6">
            <h1><strong><?php echo gettext("Produit ");?></strong></h1><br>
            <form>
                <div class="form-group">
                    <label>Id_produit: </label> <?php echo ' ' . $results['id'] ?>
                </div>

                <div class="form-group">
                    <label>Name: </label> <?php echo ' ' . $results['name'] ?>
                </div>

                <div class="form-group">
                    <label>Category: </label> <?php echo ' ' . $results['category'] ?>
                    <td> <img src="/Projet-annuel-Predfackers/public/pictures/category/<?php echo  $results['cphoto'] ?>" class="rounded mx-auto d-block" height="100" width="100" alt="..."> </td>
                </div>

                <div class="form-group">
                    <label>Mark : </label><?php echo ' ' . $results['mark'] ?>
                    <td> <img src="/Projet-annuel-Predfackers/public/pictures/mark/<?php echo  $results['mphoto'] ?>" class="rounded mx-auto d-block" height="100" width="100" alt="..."> </td>
                </div>
                <div class="form-group">
                    <label>Price :</label><?php echo ' ' . $results['price'] . "€" ?>
                </div>


            </form>
            <div class="form-action">
                <a href="?p=home" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                <?php echo '<a href="?p=form&product=' . $id . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Formulaire</a>'
                ?>
            </div>
        </div>

    </div>



</div>
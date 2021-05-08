<?php

use APP\Table\Product;
use \APP\Bootstrap\Form;
$form = new Form();
$id = $_GET["product"];
$product =  new Product();
$product->getPdo();
$results = $product->ViewProduct($id);
$date =$product->addDate($id);
$description = gettext("Le produit est il conforme");
$tabForm = [
        0=> ["radio0","radio0","Validez"],
        1=> ["radio1","radio1","Non Valide"],
        2=> ["radio1","radio2","Refusé"]
];


?>
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
            <?= '<form  method="post" action=?p=form&product='.$id.' class="form-group">';?>

                        <?=$form::radio($tabForm,$description);?>
                        <?=$form::button(gettext("Validez"));?>

            </form>
        </div>

    </div>



</div>
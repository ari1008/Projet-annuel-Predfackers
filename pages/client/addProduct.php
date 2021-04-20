<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \APP\Bootstrap\Form;
use  APP\Table\Category;
use APP\Table\Mark;
$mark = new Mark();
$mark->getPdo();
$resultsMark = $mark->markId();
$category =  new Category();
$category->getPdo();
$resultsCategory = $category->categoryID();
$product = new Form();
$nameDescription = gettext("Mettez le nom de votre produit");
$priceDescription = gettext("Mettez le prix de votre produit");
$resultsState = [
    '0'=>['id'=>"0",'name'=>gettext("Rayure")],
    '1'=>['id'=>"1",'name'=>gettext("Bonne Condition")],
    '2'=>['id'=>"2",'name'=>gettext("Très Bonne condition")],
    '3'=>['id'=>"3",'name'=>gettext("Comme neuf")]
];
?>


<div class="container">
    <div class="row">
        <form  method="post" action=?p=verificationProduct class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <?= $product::texte("name",$nameDescription,"nom");?>
                <?= $product::select($resultsMark,gettext("Ajoutez une mark"), "mark");?>
                <?= $product::select($resultsCategory,gettext("Ajoutez une categorie"), "categorie");?>
                <?= $product::select($resultsState,gettext("Mettez qualité de votre Produit"), "state");?>
                <?= $product::texteAera(gettext("Description"), gettext("Mettez une description"), "description");?>
                <?= $product::button(gettext("Ajoutez"));?>
            </div>
        </form>
    </div>
</div>
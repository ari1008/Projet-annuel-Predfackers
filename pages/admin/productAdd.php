<?php
$x = 1;
$y = 3;
use \APP\Bootstrap\Form;
$connect = new Form();
$descriptionCategory = gettext("Vous devez mettre votre catégorie");
$descriptionName = gettext("Vous devez mettre le nom du produit");
$descriptionPrice = gettext("Vous devez mettre le prix");
$descriptionDescription = gettext("Vous devez mettre la description de votre produit");
$descriptionPhoto = gettext("Vous devez mettre une photo");
$descriptionMark = gettext("Vous devez mettre votre marque lié au produit")
?>
<form  method="post" action=?p=verificationProduct  enctype="multipart/form-data" class="form-group">
    <div class="col-3">
        <?=$connect::texte(gettext("Categorie"),$descriptionCategory,"Categorie");?>
        <?=$connect::texte(gettext("Nom"),$descriptionName,"Nom");?>
        <?=$connect::number(gettext("Prix"),$descriptionPrice,"Prix",30);?>
        <?=$connect::texte(gettext("Marque"),$descriptionMark,"Marque");?>
        <?=$connect::inputFile(gettext("Photo 1"),$descriptionPhoto, "photo1");?>
        <?=$connect::texteAera(gettext("Description"),$descriptionDescription,"Description");?>
        <?=$connect::button(gettext("Ajoutez"));?>
    </div>
</form>
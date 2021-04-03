<?php
use \APP\Bootstrap\Form;
$connect = new Form();
$descriptionName = gettext("Il faut mettre le nom de la marque");
$descriptionPhoto = gettext("Mettez le logo de la marque");
?>

<form  method="post" action=?p=verificationProduct enctype="multipart/form-data" class="form-group">
    <div class="col-3">
        <?=$connect::texte(gettext("Nom"),$descriptionName,"Nom");?>
        <?=$connect::inputFile(gettext("Photo de la marque"),$descriptionPhoto, "photo");?>
        <?=$connect::button(gettext("Ajoutez"));?>
    </div>
</form>
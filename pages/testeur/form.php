<?php
use App\Bootstrap\Form;
use App\Bootstrap\Carrousel;
use app\Table\Photo;
$form = new Form();
$photo = new Photo();
$photo->getPdo();
$photoALL = $photo->viewIdProduct($_GET["product"]);
$carrousel = new Carrousel($photoALL[0], $photoALL[1], $photoALL[2]);
$carrousel->carrousell();
?>

<form  method="post" action=?p=verificationCategory enctype="multipart/form-data" class="form-group">
    <div class="col-3">


        <?=$form::button(gettext("Validez"));?>
    </div>
</form>

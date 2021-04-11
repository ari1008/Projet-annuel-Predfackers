<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
use \APP\Bootstrap\Form;
use APP\Table\Mark;
$formul= new Form();
$id_mark = $_GET["mark"];
$mark =  new Mark();
$mark->getPdo();
$results = $mark->ViewMark($id_mark);
$descriptionMark = gettext("Vous pouvez modifiez votre marque");
?>

<div class="container overflow-hidden">
    <form  method="post" action=?p=verificationModifyMark enctype="multipart/form-data" class="form-group">
        <?= $formul::texteValidate($results['name'],$descriptionMark,"name");?>
        <?= $formul::button(gettext("Ajoutez"));?>
    </form>
</div>


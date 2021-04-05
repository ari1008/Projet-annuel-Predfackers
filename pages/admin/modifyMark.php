<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
use \APP\Bootstrap\Valid;
$mark = new Valid();
$descriptionMark = gettext("Vous pouvez modifiez votre marque");
?>

<div class="container overflow-hidden">
    <?php echo 1; ?>
    <form  method="post" action=?p=verificationModifyMark enctype="multipart/form-data" class="form-group">
        <?= $mark::texteValidate(gettext("Nom"),$descriptionMark,"name");?>
        <? $mark::button(gettext("Ajoutez"));?>
    </form>
</div>


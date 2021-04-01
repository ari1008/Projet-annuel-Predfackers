<?php
$descriptionEmail = gettext("Votre email");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
use \APP\Bootstrap\Form;
$connect = new Form();
?>
<div class="container overflow-hidden">
    <form  class="form-group"  action=?p=verification method="POST" >
        <?=$connect::email(gettext("email"),$descriptionEmail,"email");?>
        <?=$connect::password(gettext("password"),$descriptionPassword,"password");?>
        <?=$connect::button(gettext("Bienvenue"));?>

    </form>
</div>






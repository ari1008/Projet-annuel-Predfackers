<?php
$descriptionEmail = gettext("Votre email");
$descriptionUsername = gettext("Votre username");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
use \APP\Bootstrap\Form;
$connect = new Form();


?>
<form  method="post" action=?p=verification class="form-group">
    <div class="col-3">
        <?=$connect::email(gettext("Email"),$descriptionEmail,"email");?>
        <?=$connect::texte(gettext("Identifiant"),$descriptionUsername,"identifiant");?>
        <?=$connect::password(gettext("Password"),$descriptionPassword,"password");?>
        <?=$connect::button(gettext("Bienvenue"));?>
    </div>
</form>
<?php
$descriptionEmail = gettext("Votre email");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
use \APP\Bootstrap\Form;
$connect = new Form();
?>
<div class="container>
    <div class="row">
        <form method="post"  action=?p=verification class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <?=$connect::email(gettext("email"),$descriptionEmail,"email");?>
                <?=$connect::password(gettext("password"),$descriptionPassword,"password");?>
                <?=$connect::button(gettext("Bienvenue"));?>
            </div>
        </form>
    </div>
</div>






<?php
$descriptionEmail = gettext("Votre email");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
use \APP\Bootstrap\Form;
$connect = new Form();
$response = (empty($_POST)) ? $_POST : null;
echo($response);
?>
<div class="container overflow-hidden">
<form action="?p=connect" method="post" class="form-group">
        <?=$connect::email(gettext("Email"),$descriptionEmail,"email");?>
        <?=$connect::password(gettext("Password"),$descriptionPassword,"password");?>
        <?=$connect::button(gettext("Bienvenue"));?>

</form>
</div>




<?php
$descriptionLastName = gettext("Votre nom");
$descriptionFirstName = gettext("Votre prenom");
$descriptionEmail = gettext("Votre email");
$descriptionUsername = gettext("Votre username");
$descriptionBirthDate = gettext("Votre date de naissance");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
use \APP\Bootstrap\Form;
$connect = new Form();


?>
<div class="container">
    <div class="row">
        <form  method="post" action=?p=verification class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <?=$connect::texte(gettext("Nom"),$descriptionLastName,"last_name");?>
                <?=$connect::texte(gettext("Prenom"),$descriptionFirstName,"first_name");?>
                <?=$connect::email(gettext("Email"),$descriptionEmail,"email");?>
                <?=$connect::texte(gettext("Identifiant"),$descriptionUsername,"identifiant");?>
                <?=$connect::date(gettext("Date de naissance"),$descriptionBirthDate,"date_birth");?>
                <?=$connect::password(gettext("Password"),$descriptionPassword,"password");?>
                <?=$connect::button(gettext("Bienvenue"));?>
            </div>
        </form>
    </div>
</div>

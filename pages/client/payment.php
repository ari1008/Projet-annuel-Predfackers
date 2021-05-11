<?php
use APP\Bootstrap\Form;
$form = new Form();
$descriptionLastName = gettext("Mettez votre Prénom");
$descriptionFirstName = gettext("Mettez votre Nom");
$descriptionEmail = gettext("Mettez votre Email");
$descriptionCVC = gettext("Mettez votre Cryptogramme");
$descriptionCard = gettext("Mettez votre numéro de carte");
$descriptionDate = gettext("Mettez votre date d'expiration");
?>
<form action="?p=testingPayment"  method="post" class="ui form">
    <?= $form::texte(gettext("Nom"),$descriptionLastName, "lastName") ?>
    <?= $form::texte(gettext("Prénom"),$descriptionFirstName, "firstName") ?>
    <?= $form::texte(gettext("Email"),$descriptionEmail, "Email") ?>
    <?= $form::number(gettext("CVC"), $descriptionCVC, "CVC",3 ) ?>
    <?= $form::number(gettext("Carte Bancaire"), $descriptionCard, "Carte Bancaire",3 ) ?>
    <?= $form::date(gettext("Date d'expiration"),$descriptionDate, "date") ?>
    <?= $form::button(gettext("Payment"));?>
</form>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use  APP\Table\User;
use \APP\Bootstrap\Form;

$user_table = new User();

if (isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['date_birth']) && isset($_POST['password'])) {
    $user_table->createUser($_POST['last_name'], $_POST['first_name'],$_POST['email'],$_POST['username'],$_POST['date_birth'],$_POST['password']);
    header('Location: ?p=list_users');
}

$descriptionLastName = gettext("Votre nom");
$descriptionFirstName = gettext("Votre prenom");
$descriptionEmail = gettext("Votre email");
$descriptionUsername = gettext("Votre username");
$descriptionBirthDate = gettext("Votre date de naissance");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
$form = new Form();
?>

<div class="container">
    <div class="row">
        <form method="post" action=?p=createUser class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <?=$form::texte(gettext("Nom"),$descriptionLastName,"last_name");?>
                <?=$form::texte(gettext("Prenom"),$descriptionFirstName,"first_name");?>
                <?=$form::email(gettext("Email"),$descriptionEmail,"email");?>
                <?=$form::texte(gettext("Username"),$descriptionUsername,"username");?>
                <?=$form::date(gettext("Date de naissance"),$descriptionBirthDate,"date_birth");?>
                <?=$form::password(gettext("Password"),$descriptionPassword,"password");?>
                <?=$form::button(gettext("Valider")); ?>
            </div>
        </form>
    </div>
</div>

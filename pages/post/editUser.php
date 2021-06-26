<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use APP\Table\User;
use \APP\Bootstrap\Form;

$user_table = new User();

if (isset($_POST['id_user'])) {
    $user_table->updateUser($_POST['id_user'], $_POST['last_name'], $_POST['first_name'],$_POST['email'],$_POST['username'],$_POST['date_birth'],$_POST['password']);
    header('Location: ?p=list_users');
}

$descriptionLastName = gettext("Votre nom");
$descriptionFirstName = gettext("Votre prenom");
$descriptionEmail = gettext("Votre email");
$descriptionUsername = gettext("Votre username");
$descriptionBirthDate = gettext("Votre date de naissance");
$descriptionPassword = gettext("Votre password doit être entre 8 et 20 characters de long");
$form = new Form();
$user_id = $_GET['user_id'];
$user = $user_table->ViewUser($user_id);
?>

<div class="container">
    <div class="row">
        <form  method="post" action=?p=editUser class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <input type="hidden" name="id_user" value="<?php echo $user_id ?>">
                <?=$form::texte(gettext("Nom"),$descriptionLastName,"last_name", $user['last_name']);?>
                <?=$form::texte(gettext("Prenom"),$descriptionFirstName,"first_name", $user['first_name']);?>
                <?=$form::email(gettext("Email"),$descriptionEmail,"email", $user['email']);?>
                <?=$form::texte(gettext("Username"),$descriptionUsername,"username", $user['username']);?>
                <?=$form::date(gettext("Date de naissance"),$descriptionBirthDate,"date_birth", $user['date_birth']);?>
                <?=$form::password(gettext("Password"),$descriptionPassword,"password", $user['password']);?>
                <?=$form::button(gettext("Modifier"));?>
            </div>
        </form>
    </div>
</div>

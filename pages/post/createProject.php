<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use  APP\Table\Project;
use \APP\Bootstrap\Form;

$project_table = new Project();

if (isset($_POST['association']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['photo'])) {
    $project_table->createProject($_POST['association'], $_POST['name'], $_POST['description'], $_POST['photo']);
    header('Location: ?p=list_projects');
}

$descriptionAssociation = gettext("Votre association");
$descriptionName = gettext("Votre nom");
$descriptionDescription = gettext("Votre description");
$descriptionPhoto = gettext("Votre photo");
$form = new Form();
?>
<div class="container">
    <div class="row">
        <form method="post" action=?p=createProject class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <?= $form::texte(gettext("Association"), $descriptionAssociation, "association"); ?>
                <?= $form::texte(gettext("Nom"), $descriptionName, "name"); ?>
                <?= $form::texte(gettext("Description"), $descriptionDescription, "description"); ?>
                <?= $form::texte(gettext("Photo"), $descriptionPhoto, "photo"); ?>
                <?= $form::button(gettext("Valider")); ?>
            </div>
        </form>
    </div>
</div>

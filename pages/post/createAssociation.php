<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use \APP\Bootstrap\Form;

if (isset($_POST['id_association'])) {
    $association_table->updateAssociation($_POST['id_association'], $_POST['photo'], $_POST['name'], $_POST['description']);
    header('Location: ?p=list_associations');
}

$descriptionPhoto = gettext("Votre photo");
$descriptionName = gettext("Votre nom");
$descriptionDescription = gettext("Votre description");

$form = new Form();


?>
<div class="container">
    <div class="row">
        <form method="post" action=?p=createAssociation class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <?=$form::texte(gettext("Photo"),$descriptionPhoto,"photo");?>
                <?=$form::texte(gettext("Nom"),$descriptionName,"name");?>
                <?=$form::texte(gettext("Description"),$descriptionDescription,"description");?>
                <?= $form::button(gettext("Valider")); ?>
            </div>
        </form>
    </div>
</div>

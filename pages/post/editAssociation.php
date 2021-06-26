<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use  APP\Table\Association;
use \APP\Bootstrap\Form;

$association_table = new Association();

if (isset($_POST['id_association'])) {
    $association_table->updateAssociation($_POST['id_association'], $_POST['photo'], $_POST['name'], $_POST['description']);
    header('Location: ?p=list_associations');
}

$descriptionPhoto = gettext("Votre photo");
$descriptionName = gettext("Votre nom");
$descriptionDescription = gettext("Votre description");
$form = new Form();
$association_id = $_GET['association_id'];
$association = $association_table->ViewAssociation($association_id);
?>

<div class="container">
    <div class="row">
        <form  method="post" action=?p=editAssociation class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <input type="hidden" name="id_association" value="<?php echo $association_id ?>">
                <?=$form::texte(gettext("Photo"),$descriptionPhoto,"photo", $association['photo']);?>
                <?=$form::texte(gettext("Nom"),$descriptionName,"name", $association['name']);?>
                <?=$form::texte(gettext("Description"),$descriptionDescription,"description", $association['description']);?>
                <?=$form::button(gettext("Modifier"));?>
            </div>
        </form>
    </div>
</div>


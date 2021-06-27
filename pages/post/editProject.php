<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use  APP\Table\Project;
use \APP\Bootstrap\Form;

$project_table = new Project();

if (isset($_POST['id_project'])) {
    $project_table->updateProject($_POST['id_project'], $_POST['association'], $_POST['name'], $_POST['description'], $_POST['photo']);
    header('Location: ?p=list_projects');
}

$descriptionAssociation = gettext("Votre association");
$descriptionName = gettext("Votre nom");
$descriptionDescription = gettext("Votre description");
$descriptionPhoto = gettext("Votre photo");
$form = new Form();
$project_id = $_GET['project_id'];
$project = $project_table->ViewProject($project_id);
?>

<div class="container">
    <div class="row">
        <form  method="post" action=?p=editProject class="col-md-6 offset-md-3">
            <div class="border px-4 py-3">
                <input type="hidden" name="id_project" value="<?php echo $project_id ?>">
                <?=$form::texte(gettext("Association"), $descriptionAssociation, "association", $project['association']);?>
                <?=$form::texte(gettext("Nom"), $descriptionName, "name", $project['name']);?>
                <?=$form::texte(gettext("Description"), $descriptionDescription, "description", $project['description']);?>
                <?= $form::texte(gettext("Photo"), $descriptionPhoto, "photo", $project['photo']);?>
                <?=$form::button(gettext("Modifier"));?>
            </div>
        </form>
    </div>
</div>


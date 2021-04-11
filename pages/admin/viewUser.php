<?php
use APP\Table\User;
$id_user = $_GET["user"];
$user =  new User();
$user->getPdo();
$results = $user->ViewUser($id_user);
?>
<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <div class="col-md-6">
            <h1><strong><?php echo gettext("UTILISATEURS");?></strong></h1><br>
            <form>
                <div class="form-group">
                    <label>Id_user: </label> <?php echo ' ' . $results['last_name'] ?>
                </div>

                <div class="form-group">
                    <label>Catégorie: </label> <?php echo ' ' . $results['first_name'] ?>
                </div>

                <div class="form-group">
                    <label>Prenom : </label><?php echo ' ' . $results['email'] ?>
                </div>
                <div class="form-group">
                    <label>Nom :</label><?php echo ' ' . $results['username'] ?>
                </div>

                <div class="form-group">
                    <label>Email :</label><?php echo ' ' . $results['date_birth'] ?>
                </div>

                <div class="form-group">
                    <label>Langue: </label> <?php echo ' ' . $results['language'] ?>
                </div>
                <div class="form-group">
                    <label>Association: </label> <?php echo ' ' . $results['association'] ?>
                </div>
                <div class="form-group">
                    <label>Valider: </label> <?php echo ' ' . $results['validate'] ?>
                </div>

            </form>
            <div class="form-action">
                <a href="?p=user" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                <?php echo '<a href="?p=deleteUSER&user=' . $id_user . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                ?>
            </div>
        </div>

    </div>



</div>
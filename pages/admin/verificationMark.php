<div class="container overflow-hidden">
    <?php
    var_dump($_POST);
    use APP\Table\Mark;
    $mark =  new Mark();
    $mark->getPdo();
    $name = rand(0,4). basename($_FILES['photo']['name']);
    $uploadfile = ROOT_FOLDER.'/public/pictures/mark/' . $name;
    if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
    {
        echo 1;
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['photo']['size'] <= 1000000)
        {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['photo']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {

                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
                chmod($uploadfile, 0777);
                echo "L'envoi a bien été effectué !";
                $results = $mark->addMark($_POST["Nom"],$name);
                header("location: admin.php?p=mark");
                exit();
            }
        }
    }
    ?>
</div>
<?php
use APP\Models\Verification;
use APP\Table\Category;
$database = new Category();
$database->getPdo();
$category = new Verification();
$name = rand(0,4). basename($_FILES['photo']['name']);
$uploadfile = ROOT_FOLDER.'/public/pictures/category/' . $name;
$length = 100;
?>

<div class="container overflow-hidden">
    <?php
    if(empty($_POST)== false AND empty($_FILES)== false){
        $result = $category->file($_FILES, $uploadfile);
        $test= $category->texte($_POST["Nom"],$length);
        echo $test;
        echo $result;
        if ($test == 1 AND $result == 1){
            $tab = [
                    "name"=>$_POST["Nom"],
                "photo"=>$name
            ];
            $database->insert("CATEGORY",$tab);
            header("location: admin.php?p=category");
            exit();
        }
    }

    ?>
</div>
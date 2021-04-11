<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use APP\Models\Verification;
use APP\Table\CaculatedPrice;
$insert = new CaculatedPrice();
$insert->getPdo();
$verificationProduct = new Verification();
$name = rand(0,4) . substr(basename($_FILES['photo']['name']), 0, 100 );
$uploadfile = ROOT_FOLDER.'/public/pictures/calculatedprice/' . $name;
?>

<div class="container overflow-hidden">
   <?php
   if(empty($_POST["Nom"])==false AND empty($_POST["Prix"])==false AND empty($_POST["Categorie"])==false ){
       if(empty($_FILES)==false AND empty($_POST["Marque"])==false ){
           $resultName = $verificationProduct->texte($_POST["Nom"],50);
           $resultPrix = $verificationProduct->number($_POST["Prix"], 6);
           $resultCategorie = $verificationProduct->number($_POST["Categorie"], 6);
           $resultMark = $verificationProduct->number($_POST["Marque"], 6);
           if($resultName == 1 AND $resultPrix == 1 AND $resultMark== 1){
               $tab = [
                   "name"=>$_POST["Nom"],
                   "photo"=>$name
               ];
               $test = $verificationProduct->file($_FILES,$uploadfile);
               if($test == 1){
                   $array = [
                           "category" => $_POST["Categorie"],
                       "name" => $_POST["Nom"],
                       "mark" => $_POST["Marque"],
                       "price" => $_POST["Prix"],
                       "photo" => $name
                   ];
                   $insert->insert("CALCULATEDPRICE",$array);
                   header("location: ?p=product");
                   exit();
               }

           }
       }
   }
   ?>
</div>

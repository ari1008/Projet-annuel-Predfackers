<div class="container overflow-hidden">
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use APP\Models\Verification;
use APP\Table\Photo;
$verification = new Verification();
if(empty($_GET['id'])==false){
    $photo = new Photo();
    $photo->getPdo();
    $nameTab = $photo->viewId($_GET['id']);
    var_dump($nameTab);
    for($i=0;$i<3;$i++){
        $dossierSource = ROOT_FOLDER.'/public/pictures/testphoto/' . $nameTab;
        $dossierDestination = ROOT_FOLDER.'/public/pictures/product/' . $nameTab;
        $test = $verification->moveFile($dossierSource, $dossierDestination);
    }



}


?>
</div>

<div class="container overflow-hidden">
<?php

use APP\Models\Verification;
use APP\Table\Photo;
$verification = new Verification();
if(empty($_GET['id'])==false){
    $photo = new Photo();
    $photo->getPdo();
    $nameTab = $photo->viewId($_GET['id']);
    for($i=0;$i<3;$i++){
        $dossierSource = ROOT_FOLDER.'/public/pictures/testphoto/' . $nameTab[$i]["name"];
        $dossierDestination = ROOT_FOLDER.'/public/pictures/product/' . $nameTab[$i]["name"];
        $test = $verification->moveFile($dossierSource, $dossierDestination);
    }
}


?>
</div>

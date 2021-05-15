<div class="container overflow-hidden">
<?php

use APP\Models\Verification;
use APP\Table\Photo;
use \APP\Table\User;
use APP\Models\Filesend;
use APP\Models\Mail;
$verification = new Verification();
if(empty($_GET['id'])==false){
    $photo = new Photo();
    $photo->getPdo();
    $nameTab = $photo->viewIdProduct($_GET['id']);
    for($i=0;$i<3;$i++){
        $dossierSource = ROOT_FOLDER.'/public/pictures/testphoto/' . $nameTab[$i]["name"];
        $dossierDestination = ROOT_FOLDER.'/public/pictures/product/' . $nameTab[$i]["name"];
        $test = $verification->moveFile($dossierSource, $dossierDestination);
    }
    $user = new User();
    $user->getPdo();
    $result = $user->send($_SESSION["id"]);
    $content = ob_get_clean();
    require_once ROOT_FOLDER . "/fpdf/fpdf.php";
    $output = ROOT_FOLDER . "/public/pdf/";
    $pdf = new FPDF();
    $file = new Filesend($pdf, $output, $result["address"], $_SESSION["id"] , $result["warehouse"]);
    $file->table();

    $mail = new Mail($file->getterOutput(), $_SESSION["id"]);
    $mail->sendPdf();
    ob_start();
    header("location: client.php");
    exit(200);
}


?>
</div>

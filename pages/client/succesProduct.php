
<div class="container">
    <?php
    use APP\Models\Emailpay;
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    use APP\Models\Billsend;
    $content =  ob_get_clean();
    require_once ROOT_FOLDER . "/fpdf/fpdf.php";
    $output = ROOT_FOLDER . "/public/pdf/";
    $pdf = new FPDF();
    $billing = new Billsend($pdf, $output, $_GET["id"]);

    $mail = new Emailpay($output ."Billing_Fredpacker.pdf" ,$_GET["id"]);
    $mail->Content();
    $mail->sendPdf();
    var_dump($_GET["id"]);
    ob_end_flush();
    $content = $content . ob_start();
    ?>
</div>
<?php
/*use APP\Table\Verification;
$verification = new Verification();
$verification->getPdo();
$verification->buyProduct($_GET['product'],$_GET["id"]);
header('Location: client.php');
exit(200);*/
?>
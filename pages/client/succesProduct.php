
<div class="container">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    use APP\Models\Billsend;
    $content = ob_get_clean();
    require_once ROOT_FOLDER . "/fpdf/fpdf.php";
    $output = ROOT_FOLDER . "/public/pdf/";
    $pdf = new FPDF();
    $billing = new Billsend($pdf, $output, $_GET["id"]);
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
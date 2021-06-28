
<div class="container">
    <?php
    use APP\Table\Verification;
    use APP\Table\Token;
    use APP\Models\Emailpay;
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    use APP\Models\Billsend;
    $content =  ob_get_clean();
    require_once ROOT_FOLDER . "/fpdf/fpdf.php";
    $output = ROOT_FOLDER . "/public/pdf/";
    $pdf = new FPDF();
    $billing = new Billsend($pdf, $output, $_GET["id"], $_GET["product"]);
    $token = new Token();
    $token->getPdo();
    $token->insertToken($_GET["id"],$billing->token);
    $mail = new Emailpay($output ."Billing_Fredpacker.pdf" ,$_GET["id"]);
    $mail->Content();
    $mail->sendPdf();
    ob_get_clean();
    ob_start();
    $verification = new Verification();
    $verification->getPdo();
    $verification->buyProduct($_GET['product'],$_GET["id"]);
    header('Location: ?p=home');
    exit();
    ?>
</div>

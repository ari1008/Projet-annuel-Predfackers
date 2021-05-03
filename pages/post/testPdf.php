<div class="container">
    <?php
    use APP\Models\Filesend;
    use APP\Models\Mail;
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $content = ob_get_clean();
    require_once ROOT_FOLDER . "/fpdf/fpdf.php";
    $output = ROOT_FOLDER . "/public/pdf/";
    $pdf = new FPDF();
    $file = new Filesend($pdf, $output, 1, 9 , 1);
    $file->table();

    $mail = new Mail($file->getterOutput(), 9);
    $mail->sendPdf();
    ob_start();



    ?>
</div>

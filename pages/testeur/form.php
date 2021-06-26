<?php
use APP\Bootstrap\Form;
use \APP\Table\Verification;
use \APP\Table\Product;
use APP\Models\Email;

use APP\Models\Emailrefused;
$verification = new Verification();
$verification->getPdo();
$description = gettext("Le prix que vous proposeriez");
$form = new Form();
$validate = gettext("Merci d'avoir validé le produit");
$bddproduct = new Product();
$bddproduct->getPdo();
$value = $bddproduct->productPrice($_GET["product"]);
$product = new Product();
$value = $bddproduct->productValueOne($_GET["product"]);
echo '<div class="container admin">';
if($_POST["gridRadios"]=="radio1"){
    $content =  '
        <div class="container">
            <div class="row">
                <form class="col-md-6 offset-md-3" role="form" action=?p=newPrice  method="POST">
                    <div>
                        <p class="alert alert-warning">' . gettext("Prix actuel: " . $value[0] . "€"). '</p>
                        <div class="form-action">'.
        $form::number(gettext("Nouveau prix"), $description,"price", 9);
    $form::hidden("id_product", $_GET["product"]);
    $form::button(gettext("Validez")) .
    '</div>
                    </div>
                </form>
            </div>
        </div>
    ';
}elseif ($_POST["gridRadios"]=="radio0"){
    echo "validate";
    $verification->validateOne($_GET["product"],1);
    $email = new Email($_GET["product"]);
    $email->Content();
    $email->sendMail();
    header("location: testeur.php");
    exit(200);
}elseif ($_POST["gridRadios"] == "radio2"){
    echo "refused";
    $verification->validateOne($_GET["product"],2);
    $email = new Emailrefused($_GET["product"]);
    $email->Content();
    $email->sendMail();
    header("location: testeur.php");
    exit(200);
}

echo "</div>";
<div class="container overflow-hidden">
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use APP\Table\CaculatedPrice;
use APP\Models\CalculPrice;
use APP\Table\Product;
var_dump($_SESSION);

if(empty($_POST["nom"])==false AND empty($_POST["mark"])==false AND empty($_POST["categorie"])==false AND isset($_POST["state"])!=false AND empty($_POST["description"])==false ) {
    $calcule = new CaculatedPrice();
    $calcule->getPdo();
    $mark = $calcule->viewMarkAVG($_POST["mark"]);
    $category = $calcule->viewCategoryAVG($_POST["categorie"]);
    $price = new CalculPrice($mark, $category,$_POST["state"]);
    $value = $price->result;
    $insert = new Product();
    $insert->getPdo();
    $array = [
        "category" => $_POST["categorie"],
        "name" => $_POST["nom"],
        "userpropose" => $_SESSION['id'],
        "description" => $_POST["description"],
        "price" => $value,
        "mark" => $_POST["mark"],
        "state" => $_POST["state"],
        "validate" => "0"
    ];
    #$insert->insert("PRODUCT",);
    $content =  '
        <div class="container">
            <div class="row">
                <form class="col-md-6 offset-md-3" role="form" action=?p=test method="POST">
                    <div>
                        <p class="alert alert-warning">Notre prix ' .$value .' </p>
                        <div class="form-action">
                            <button type="submit" class="btn btn-warning"> oui </button>
                            <a href="?p=validate" class="btn btn-default">non</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    ';
    echo $content;
}

?>
</div>
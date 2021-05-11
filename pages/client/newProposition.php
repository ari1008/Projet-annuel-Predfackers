<?php
use APP\Bootstrap\Form;
use \APP\Table\Product;
$product = new Product();
$product->getPdo();
$product->viewProductPrice($_GET["product"]);
$form = new Form();
$name = gettext("Accepter le nouveau prix");
$tab = [
    0  =>["accept","accept","Accepter"],
    1=>["refuse","refuse","Refuser"]
];
echo '<div class="container">
            <div class="row">
                <form class="col-md-6 offset-md-3" role="form" action=?p=newPrice  method="POST">
                    <div>
                        <p class="alert alert-warning">' . gettext("Prix actuel: " . 10 . "€"). '</p>
                        <div class="form-action">'.
                                $form::radio($tab, $name);
                                $form::hidden("id_product", $_GET["product"]);
                                $form::button(gettext("Validez")) .
                        '</div>
                    </div>
                </form>
            </div>
        </div>';
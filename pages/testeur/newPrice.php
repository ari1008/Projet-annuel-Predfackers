<?php
use APP\Models\Emailnewprice;
use \APP\Table\Verification;
echo '<div class="container admin">';
$price = $_POST["price"];
$id_product = $_POST["id_product"];
$verification = new Verification();
$verification->getPdo();
$verification->validate($id_product, $price, 3);
$email = new Emailnewprice($id_product, $price);
$email->Content();
$email->sendMail();
header("location: testeur.php?p=validateProduct");
exit();
echo '</div>';
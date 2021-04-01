<div class="container overflow-hidden">
<?php
use APP\Database;
use APP\Models\Auth;
$db = new Database();
$db->getPdo();
##print_r($db->pdo);

$tab = ["email"];
$operator = [','];
$authentification = new Auth($_POST["email"],$_POST["password"],$db->select('USER',$_POST));


?>
</div>

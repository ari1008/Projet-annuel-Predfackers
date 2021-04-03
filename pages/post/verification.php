<div class="container overflow-hidden">
<?php
use APP\Database;
use APP\Models\Auth;


if(empty($_POST["email"])!= TRUE AND empty($_POST["password"])!= TRUE AND empty($_POST["identifiant"])!= TRUE){
    $register = new Auth($_POST["email"],$_POST["password"],$db = new Database(), $_POST["identifiant"]);
}elseif(empty($_POST["email"])!= 0 AND empty($_POST["password"])!= 0 AND empty($_POST["identifiant"])!= 0){
    $idenfication = new Auth($_POST["email"],$_POST["password"],$db = new Database());
}

?>
</div>

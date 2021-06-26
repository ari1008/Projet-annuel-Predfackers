<div class="container overflow-hidden">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    use APP\Database;
    use APP\Models\Auth;

    if(empty($_POST["photo"])!= TRUE AND empty($_POST["name"])!= TRUE AND empty($_POST["description"])!= TRUE){
        $register = new Auth($_POST["email"],$_POST["password"],$db = new Database(), $_POST["identifiant"]);
    }elseif(empty($_POST["email"])!= TRUE AND empty($_POST["password"])!= TRUE){
        $idenfication = new Auth($_POST["email"],$_POST["password"],$db = new Database());

    }
    var_dump($_SESSION);

    ?>
</div><?php

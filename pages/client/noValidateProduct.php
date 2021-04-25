<div class="container overflow-hidden">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    use APP\Models\Verification;
    use APP\Table\Photo;
    use APP\Table\Product;
    echo $_GET['id'];
    if(empty($_GET['id'])==false){
        $photo = new Photo();
        $photo->getPdo();
        $nameTab = $photo->viewId($_GET['id']);
        var_dump($nameTab);
        for($i=0;$i<3;$i++){
            $dossierSource = ROOT_FOLDER.'/public/pictures/testphoto/' . $nameTab;
            unlink($dossierSource);
        }
        $product = new Product();
        $photoAll = new Photo();
        $product->getPdo();
        $photoAll->getPdo();
        $product->delete($_GET['id']);
        $photoAll->delete($_GET['id']);

    }


    ?>
</div>


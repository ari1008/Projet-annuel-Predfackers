<div class="container overflow-hidden">
<?php
use APP\Table\CaculatedPrice;
use APP\Models\CalculPrice;
use APP\Table\Product;
use APP\Table\Photo;
use APP\Models\Verification;
use APP\Models\Filesend;
use APP\Models\Mail;

if(empty($_POST["nom"])==false AND empty($_POST["mark"])==false AND empty($_POST["categorie"])==false AND isset($_POST["state"])!=false
    AND empty($_POST["description"])==false ) {
    if(empty($_FILES["photo1"])==false AND empty($_FILES["photo2"])==false AND empty($_FILES["photo3"])==false){
        $photo = new Photo();
        var_dump($_POST);
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
            "warehouse"=> $_POST["gridRadios"],
            "name" => $_POST["nom"],
            "userpropose" => $_SESSION['id'],
            "description" => $_POST["description"],
            "price" => $value,
            "mark" => $_POST["mark"],
            "state" => $_POST["state"],
            "validate" => "0"
        ];
        $insert->insert("PRODUCT",$array);
        $insert->getPdo();
        $lastid = $insert->LastIdProduct();
        $id = $lastid[0];
        for($i=1;$i<4;$i++){
            $namePhoto = 'photo' . $i;
            $name = rand(0,100) . substr(basename($_FILES[$namePhoto]['name']), 0, 100 );
            $uploadfile = ROOT_FOLDER.'/public/pictures/testphoto/' . $name;
            $verificationPhoto = new Verification();
            $test = $verificationPhoto->filePhotoMulti($_FILES,$uploadfile, $namePhoto);
            echo $test;
            $photo->getPdo();
            $photo->insert($id,$name);

        }

        $content =  '
        <div class="container">
            <div class="row">
                <form class="col-md-6 offset-md-3" role="form" action=?p=validateProduct&id='.$lastid[0] . '  method="POST">
                    <div>
                        <p class="alert alert-warning">Notre prix ' .$value .' </p>
                        <div class="form-action">
                            <button type="submit" class="btn btn-warning"> oui </button>
                            <a href="?p=noValidateProduct&id='.$lastid[0] . '" class="btn btn-default">non</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    ';
        echo $content;

    }

}

?>
</div>
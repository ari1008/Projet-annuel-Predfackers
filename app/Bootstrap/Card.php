<?php


namespace App\Bootstrap;
use \APP\Bootstrap\Carrousel;
use app\Table\Photo;
use APP\Table\Product;

/*
 * faire une Carte bostrap pour pouvoir voir tout les produits de la bdd. Avec les images.
 * Le seul problème est le foreach
 */
class Card {
    private $id_category;
    private $id_mark;
    private $productClass;

    public function __construct($category, $mark){
        $this->id_category = $category;
        $this->id_mark= $mark;
        $this->productClass = new Product();
        $this->productClass->getPdo();
        $this->multiCard();

    }
    public function multiCard(){
        $count = $this->countProduct();
        echo $count;
        $product = $this->productClass->prodNewPrice($this->id_category,$this->id_mark);
        for($i=0;$i<$count;$i=$i++){
            echo '<div class="card-group" style="width: 18rem;">';
            for($i=0;$i<3;$i++){
                $this->card($product[$i]);
            }
            echo '</div>';
        }
    }

    public function card($product){
        $photo = $this->photo($product["id"]);
        echo '<div class="card" >
                    '.$this->carousel($photo[0],$photo[1],$photo[2]).'
                    <div class="card-body">
                      <h5 class="card-title">'.$product["name"].'</h5>
                      <p class="card-text"><small class="text-muted">'.gettext("Etat: ") . $product["state"].'</small></p>
                      <p class="card-text">'. $product["description"].'</p>
                      <a href="#" class="btn btn-primary">'.gettext("Prix: ") . $product["price"].'</a>
                    </div>
                  </div>';
    }



    public function carousel($photo, $photo1, $photo2)
    {
       $content =  '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 18rem;">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="'.$photo.'" class="d-block w-100" alt="..." style="width:100%; height:auto">
                        </div>
                        <div class="carousel-item">
                          <img src="'.$photo1.'" class="d-block w-100" alt="..." style="width:100%; height:auto">
                        </div>
                        <div class="carousel-item">
                          <img src="'.$photo2.'" class="d-block w-100" alt="..." style="width:100%; height:auto">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>';
        echo $content;
    }

    public function photo($id_product){
        $photo = new Photo();
        $photo->getPdo();
        $photo->viewIdProduct($id_product);
        //$photo = "pictures/logo/PredFacker_logo.png";
        for($i=0;$i<3;$i++){
            $photoAll[$i] = "pictures/product/" . $photo[$i]["photo"];
        }
        return $photoAll;
    }

    public function countProduct(){
        $product = new Product();
        $product->getPdo();
        $count =  $product->prodCountCatMak($this->id_mark,$this->id_category);
        var_dump($count);
        return $count[0];
    }
}
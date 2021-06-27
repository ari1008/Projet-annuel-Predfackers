<?php


namespace App\Bootstrap;
use \APP\Bootstrap\Card;
use APP\Database;
use APP\Table\Photo;
use APP\Table\Product;

class Cardpay extends Card{
    public $id_user;
    /*
     *  Class qui nous permet de faire les cartes pour l'affichage au moment du payement
     */


    public function __construct($category, $mark, $url, $id_user){
        $this->id_category = $category;
        $this->id_mark= $mark;
        $this->url = $url;
        $this->id_user=$id_user;
        $this->productClass = new Product();
        $this->productClass->getPdo();
        $this->multiCard();


    }

    /*
     * Affichage du de la carte avec le carrousel
     */
    public function card($product){
        $photo = $this->photo($product["id"]);
        echo '<div class="card"  style="width: 18rem;">
                    '.$this->carousel($photo[0],$photo[1],$photo[2]).'
                    <div class="card-body">
                      <h5 class="card-title">'.$product["name"].'</h5>
                      <p class="card-text"><small class="text-muted">'.gettext("Etat: ") . $product["state"].'</small></p>
                      <p class="card-text">'. $product["description"].'</p>
                      <a href="'.$this->url.'&product='.$product["id"].'" class="btn btn-primary">'.gettext("Prix: ") . $product["price"]*1.3. 'euro</a>
                    </div>
                  </div>';
    }

    /*
     * affichage des toute les cartes de façon a bien les ordonné
     */

    public function multiCard(){
        $count = $this->countProduct();
        if ($count == 0){
            echo gettext("il n'y a rien désolé");
            return 0;
        }else{
            $product = $this->productClass->prodNewPriceUser($this->id_category,$this->id_mark,$this->id_user);
            for($i=0;$i<$count;$i++){
                if ($i%3==0){
                    echo '</div>';
                    echo '<div class="card-group" >';
                    $this->card($product[$i]);

                }else{
                    $this->card($product[$i]);
                }
            }
            echo '</div>';

        }
        return 1;

    }

     /*
      * Fonction qui vas nous permettre d'avoir le nombre de produit par rapport au marque et au catégorie et l'utilisateur
      */
    public function countProduct(){
        $product = new Product();
        $product->getPdo();
        $count =  $product->prodCountCatMakUser($this->id_mark,$this->id_category,$this->id_user);
        return $count[0];
    }
}
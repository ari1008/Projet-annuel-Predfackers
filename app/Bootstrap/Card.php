<?php


namespace App\Bootstrap;
use \APP\Bootstrap\Carrousel;
/*
 * faire une Carte bostrap pour pouvoir voir tout les produits de la bdd. Avec les images.
 * Le seul problème est le foreach
 */
class Card extends Carrousel{

    public function __construct(){
        $this->card();

    }

    public function card(){
        $photo = "pictures/logo/PredFacker_logo.png";
        echo '<div class="card-deck" style="max-width: 18rem;">
                  <div class="card">
                    <img class="card-img-top" src="'.$photo.'" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="'.$photo.'" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="'.$photo.'" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
        </div>';
    }

    public function photo(){

    }
}
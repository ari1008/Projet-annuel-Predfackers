<?php
namespace App\Bootstrap;


class Carrousel{
    private $image1;
    private $image2;
    private $image3;

    /**
     * Carrousel constructor.
     * @param $image1
     */
    public function __construct($image1, $image2, $image3)
    {
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3= $image3;
    }

    public function carrousell(){
        $content = 'div id="carrousell" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="'.$this->image1.'" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="'.$this->image2.'" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="'.$this->image3.'" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>';
        echo $content;
    }


}
<?php


namespace app\Models;


class CalculPrice{
    public $result;

    public function __construct($mark, $category, $state){
        switch($state) {
            case 0:
                $this->result = round((($mark["priceMark"] + $category["priceCat"])/ 2 )* 0.85,2);
                break;
            case 1:
                $this->result = round((($mark["priceMark"] + $category["priceCat"]) / 2) * 0.90,2);
                break;
            case 2:
                $this->result =round( (($mark["priceMark"] + $category["priceCat"]) / 2) * 0.95 ,2);
                break;
            case 3:
                $this->result = round((($mark["priceMark"] + $category["priceCat"]) / 2) * 0.98 ,2);
                break;
        }
    }


}
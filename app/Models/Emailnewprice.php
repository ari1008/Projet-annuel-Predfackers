<?php


namespace app\Models;

use APP\Table\Product;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use APP\Table\User;
use APP\Models\Email;
class Emailnewprice extends Email{
    protected $price;

    public function __construct($id_product, $price)
    {
        parent::__construct($id_product);
        $this->price = $price;
    }

    public function Content()
    {
        $this->phpmail->Subject ="Votre produit  ne coute pas ce prix";
        $this->phpmail->Body = "Bonjour  {$this->lastName} {$this->firstName} 
            Nous vous remercions pour votre démarche sur notre site PredFacker's.\n
            Mais votre produit ne cout pas autant\n
            Nous vous proposons {$this->price}. \n
             <strong> Attention dernière offre</strong>";
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

}
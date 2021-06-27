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

    /*
     * C'est le contenu qui nous permet d'envoyer le contenu dans
     */
    public function Content()
    {
        $this->phpmail->Subject =utf8_decode(gettext("Votre produit  ne coute pas ce prix"));
        $this->phpmail->Body = utf8_decode(gettext("Bonjour")). "  {$this->lastName} {$this->firstName}" .
            utf8_decode(gettext("Nous vous remercions pour votre démarche sur notre site PredFacker's.\n
            Mais votre produit ne cout pas autant\n
            Nous vous proposons {$this->price}. \n")) ."<strong>".
             utf8_decode(gettext(" Attention dernière offre")) . "</strong>";
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

}
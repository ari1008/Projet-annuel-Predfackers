<?php


namespace app\Models;
namespace app\Models;

use APP\Table\Product;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use APP\Table\User;
use APP\Models\Email;

class Emailrefused extends  Email{
    public function Content()
    {
        $this->phpmail->Subject ="Votre produit  est défectueux";
        $this->phpmail->Body = "Bonjour  {$this->lastName} {$this->firstName} 
            Nous vous remercions pour votre démarche sur notre site PredFacker's.\n
            Mais votre produit ne cout pas autant\n
            Nous vous demanderons 50euros pour ne pas le détruire";
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

}
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
    /*
     * Cette fonction nous permet de mettre un contenu pour les email refusé
     */
    public function Content()
    {
        $this->phpmail->Subject =utf8_decode(gettext("Votre produit  est défectueux"));
        $this->phpmail->Body = utf8_decode(gettext("Bonjour"))."  {$this->lastName} {$this->firstName} ".utf8_decode(gettext("
            Nous vous remercions pour votre démarche sur notre site PredFacker's.\n
            Mais votre produit ne cout pas autant\n
            Nous vous demanderons 50euros pour ne pas le détruire"));
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

}
<?php

namespace app\Models;

use APP\Table\Product;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use APP\Table\User;
use APP\Models\Mail;
class Emailpay extends  Mail{
   /*
    * Cette class nous permet d'écrire le contenu du mail pour la facture et autre
    */
    public function Content(){
        $this->phpmail->Subject = utf8_decode(gettext('Bon colisimo pour Predfackers'));
        $this->phpmail->Body = utf8_decode(gettext("Bonjour ")) . " {$this->lastName} {$this->firstName} ".
            utf8_decode(gettext(" Nous vous remercions pour votre démarche sur notre site PredFacker's.
            Vous trouverez ci-joint votre facture nous vous envoyerons votre colis .
            Cordialement"));
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

}
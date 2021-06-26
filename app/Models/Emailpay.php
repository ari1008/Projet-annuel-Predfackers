<?php

namespace app\Models;

use APP\Table\Product;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use APP\Table\User;
use APP\Models\Mail;
class Emailpay extends  Mail{

    public function Content(){
        $this->phpmail->Subject = 'Bon colisimo pour Predfackers';
        $this->phpmail->Body = "Bonjour  {$this->lastName} {$this->firstName} 
            Nous vous remercions pour votre démarche sur notre site PredFacker's.
            Vous trouverez ci-joint votre facture nous vous envoyerons votre colis .
            Cordialement";
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

}
<?php


namespace app\Models;

use APP\Table\Product;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use APP\Table\User;
use APP\Models\Mail;
class Email extends Mail{

    public function __construct($id_product){
        $this->phpmail = new PHPMailer(true);
        $this->phpmail->CharSet = "UTF-8";
        $result = $this->product($id_product);
        $this->name($result["userpropose"]);
    }

    public function  sendMail(){
        try {
            //Server settings
            $this->phpmail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->phpmail->isSMTP(0);                                            //Send using SMTP
            $this->phpmail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->phpmail->SMTPAuth = true;                                   //Enable SMTP authentication
            $this->phpmail->Username = 'predfackers@gmail.com';                     //SMTP username
            $this->phpmail->Password = $this->password;                               //SMTP password
            $this->phpmail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->phpmail->Port = 587;         //465 or 587                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->phpmail->setFrom('predfackers@gmail.com', 'Predfackers');
            $name =" {$this->lastName}  {$this->firstName}";
            $this->phpmail->addAddress($this->mail,$name );     //Add a recipient


            //Content
            $this->Content();

            $this->phpmail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->phpmail->ErrorInfo}";
        }
    }

    public function Content()
    {
        $this->phpmail->Subject ="Votre produit a été acceptè";
        $this->phpmail->Body = "Bonjour  {$this->lastName} {$this->firstName} 
            Nous vous remercions pour votre démarche sur notre site PredFacker's.";
        $this->phpmail->isHTML(true);
        $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }
    public function product($id_product){
        $product = new Product();
        $product->getPdo();
        return $product->viewIdUser($id_product);
    }


}
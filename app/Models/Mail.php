<?php


namespace app\Models;
require ROOT_FOLDER. '/PHPMailer/Exception.php';
require ROOT_FOLDER. '/PHPMailer/PHPMailer.php';
require ROOT_FOLDER.'/PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use APP\Table\User;
class Mail{
    protected $mail;
    private $outputFile;
    protected $firstName;
    protected $lastName;
    protected $phpmail;
    protected $password = "EgdOYCNeLQHONH0";

    public function __construct($outputFile, $id_user){
        $this->outputFile= $outputFile;
        $this->phpmail = new PHPMailer(true);
        $this->phpmail->CharSet = "UTF-8";
        $this->name($id_user);


    }

    /*
     * Cette fonction vas lancer le mail avec son try catch avec un fichier comme attachement 
     */
        public function sendPdf(){
            try {
                //Server settings
                $this->phpmail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $this->phpmail->isSMTP(2);                                            //Send using SMTP
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

                //Attachments
                $this->phpmail->addAttachment($this->outputFile);         //Add attachments

                //Content
                $this->Content();

                $this->phpmail->send();
                echo 'Message has been sent';
                unlink($this->outputFile);
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->phpmail->ErrorInfo}";
            }

        }

        /*
         * function qui nous permet d'afficher les données du contenu du mail
         */
        public function Content(){
            $this->phpmail->Subject = utf8_decode(gettext('Bon colisimo pour Predfackers'));
            $this->phpmail->Body = utf8_decode(gettext("Bonjour ")) ." {$this->lastName} {$this->firstName}" .
                utf8_decode(gettext("Nous vous remercions pour votre démarche sur notre site PredFacker's.
            Vous trouverez ci-joint votre bon Collisimo pour nous envoyer votre colis. Cordialement"));
            $this->phpmail->isHTML(true);
            $this->phpmail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        }

        /*
         * fonction qui nous permet de récupèrer de la bdd avec les utilisateurs du prénom , nom et de l'email
         */
        public function name($id_user){
            $user = new User();
            $user->getPdo();
            $result = $user->selectNameEmail($id_user);
            $this->firstName = $result["first_name"];
            $this->lastName = $result["last_name"];
            $this->mail = $result["email"];
        }


}
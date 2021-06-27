<?php
# grace a l'user on récupère l'adresse
#grâce a l'autre la warehouse
# et une autre pour le prix et autre
#ajout d'une image
# Tout a refactoriser

namespace app\Models;

use APP\Database;
use APP\Table\Warehouse;
use FPDF;
use APP\Table\Product;
use APP\Table\User;
use APP\Table\Address;
use APP\Models\Filesend;

class Billsend extends Filesend{
    protected $id_product;
    protected $mark;
    protected $category;
    protected  $price;
    protected $nameProduct;
    protected $warehouse;
    protected $token;

    public function __construct(FPDF $pdf, $output, $id_user, $idProduct){
        $output = $output . "Billing_Fredpacker.pdf";
        $this->output = $output;
        $this->id_user = $id_user;
        $this->id_product=$idProduct;
        $this->product();
        $this->pdf = $pdf;
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',14);
        $this->header();
        $this->content();
        $this->board();
        $pdf->Output($this->output, 'F');
    }

    /*
     * permet de nous écrire la ligne dans le pdf
     */
    public function write($html){
        $this->pdf->Write(5,$html);
    }

    public function header()
    {
        $file = ROOT_FOLDER .  "/public/pictures/logo/PredFacker_logo.png";
        $this->pdf->Image($file,170,6,30);
        $html = 'FREDPACKERS';
        $this->write($html);
    }
    /*
     * Permet de nous écrire la ligne la plus importante
     */
    public function content(){
        $user = $this->utility(new User());

        $this->pdf->Cell(0);
        $this->pdf->SetLeftMargin(10);
        $content = gettext("Facture pour Mr ") . $user[0] . " " . $user[1]  .  gettext(" :");
        $content = $content . gettext("Le nom du produit est ") . $this->nameProduct . gettext(" de la marque ") . $this->mark;
        $content =$content .  utf8_decode(gettext("La catégorie est ")) . $this->category . gettext(" et l'entrepot ") . $this->warehouse;
        $content = $content . utf8_decode(gettext("Le prix est  ")) . $this->price . gettext(" et le nombre de token ") . $this->token;
        $this->pdf->Write(20,$content);
    }

    /*
     * Cela nous permet de créer le tableau de l'adresse
     */
    public function board(){
        $addressResult = $this->setAddressRecipient(new Address()) ;
        $w = array(60, 60, 60, 60);
        // En-tête
        $header = array(gettext('Adresse'));
        $this->pdf->SetXY(60, 60);
        for($i=0;$i<count($header);$i++)
            $this->pdf->Cell(60,6,$header[$i],1,0,'C');
        $this->pdf->Ln();
        for($y=0;$y<count($addressResult)/2;$y++)
        {
            $this->pdf->Cell(60,6,utf8_decode($addressResult[$y]),1);
            $this->pdf->Ln();
        }
    }

    /*
     * Nous permet de récupérer l'adress dans le permet  de demander l'addresse de l'utilisateur
     */

    public function setAddressRecipient(Address $address)
    {
        $address->getPdo();
        $result = $address->idUser($this->id_user);
        return $result;
    }

    /*
     * Cette fonction nous permet avec une function pour le sql. Qui vas nous permettre de stocker
     *  dans les attributs ce qui nous sort
     */
    public function product(){
        $product = new Product();
        $product->getPdo();
        $productTab = $product->productBillingPDF($this->id_product);
        $this->nameProduct = $productTab["name"];
        $this->mark = $productTab["mark"];
        $this->category = $productTab["category"];
        $this->warehouse = $productTab["warehouse"];
        $this->price = $productTab["price"]*1.3;
        $this->token = $this->price %10;
    }


}
<?php
namespace app\Models;

use APP\Table\Warehouse;
use FPDF;
use APP\Table\User;
use APP\Table\Address;


class Filesend{
    protected $pdf;
    protected $output;
    protected $id_address;
    protected $id_user;
    protected $id_warehouse;

    public function __construct(  FPDF $pdf, $output, $id_address, $id_user, $id_warehouse){
        $output = $output . "Predfacker.pdf";
        $this->output = $output;
        $this->id_address = $id_address;
        $this->id_user = $id_user;
        $this->id_warehouse = $id_warehouse;
        $this->pdf = $pdf;
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',14);
        $this->header();


    }

    public function  setAddressRecipient(Address $address){
        $address->getPdo();
        $result = $address->idSelect($this->id_address, $this->id_user);
        return $result;
    }

    public function header(){
        $file = ROOT_FOLDER .  "/public/pictures/logo/PredFacker_logo.png";
        $this->pdf->Image($file,170,6,30);
        $userResult = $this->utility(new User());
        $this->pdf->Cell(40,10,'Predfackers');
        $this->pdf->Ln(10);
        $numberColis = utf8_decode("numéro de colis: XX"  . rand(0,999999999) . "FR");
        $cachetPoste = utf8_decode("Cachet de la poste ici:");
        $date = utf8_decode("La date est " . date('d/m/Y'));
        $this->pdf->Cell(40,10,$date);
        $this->pdf->Ln(10);
        $this->pdf->Cell(40,10,$numberColis);
        $this->pdf->Ln(10);
        $this->pdf->Cell(40,10,$cachetPoste);
        $this->pdf->Ln(20);
        $contentFirst = utf8_decode("Prénom: " . $userResult["first_name"]);
        $this->pdf->Cell(40,10,$contentFirst);
        $this->pdf->Ln(10);
        $contentLast = utf8_decode("Nom: " . $userResult["last_name"]);
        $this->pdf->Cell(40,10,$contentLast);
        $this->pdf->Ln(20);
    }

    public function utility(User $user){
        $user->getPdo();
        $result = $user->selectNameLast($this->id_user);
        return $result;
    }

    public function warehouse(Warehouse $warehouse){
        $warehouse->getPdo();
        $result = $warehouse->idSelect($this->id_warehouse);
        return $result;
    }
    public function table(){

        $warehouseResult = $this->warehouse(new Warehouse());
        $addressResult = $this->setAddressRecipient(new Address()) ;

        $header = array('Expediteur','Destinataire');
        $this->ImprovedTable($header, $addressResult,$warehouseResult);
        $this->pdf->Output($this->output, 'F');
        chmod($this->output, 0777);

    }


    // Tableau amélioré
    function ImprovedTable($header, $addressResult,$warehouseResult){
        // Largeurs des colonnes
        $w = array(60, 60, 60, 60);
        // En-tête
        for($i=0;$i<count($header);$i++)
            $this->pdf->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->pdf->Ln();
        // Données
        for($y=0;$y<count($addressResult)/2;$y++)
            {
                $this->pdf->Cell(60,6,utf8_decode($addressResult[$y]),1);
                $this->pdf->Cell(60,6,utf8_decode($warehouseResult[$y]),1);
                $this->pdf->Ln();
            }

    }

     public function getterOutput(){
        return $this->output;
    }

    public function getAddres(){

    }




}
<?php


namespace app\Models;

use APP\Database;
use APP\Table\Warehouse;
use FPDF;
use APP\Table\User;
use APP\Table\Address;
use APP\Models\Filesend;

class Billsend extends Filesend{
    protected $test;

    public function __construct(FPDF $pdf, $output, $id_user, $id_address=1, $id_warehouse=1 ){
        $output = $output . "Billing_Fredpacker.pdf";
        $this->output = $output;
        $this->id_user = $id_user;
        $this->id_address = $id_address;
        $this->id_warehouse = $id_warehouse;
        $this->pdf = $pdf;
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',14);
        $this->header();
        $this->content();
        $this->board();
        $pdf->Output();
    }

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

    public function content(){
        $user = $this->utility(new User());
        $content = gettext("Facture pour Mr ") . $user[0] . " " . $user[1]  .  gettext(" :");
        $this->pdf->Cell(0);
        $this->pdf->SetLeftMargin(40);
        $this->pdf->Write(20,$content);

    }

    public function board(){
        $addressResult = $this->setAddressRecipient(new Address()) ;
        $w = array(60, 60, 60, 60);
        // En-tête
        $header = array('Adresse');
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



}
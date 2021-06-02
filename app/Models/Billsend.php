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

    public function __construct(FPDF $pdf, $output, $id_user ){
        $output = $output . "Billing_Fredpacker.pdf";
        $this->output = $output;
        $this->id_user = $id_user;
        $this->pdf = $pdf;
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',14);
        $this->header();
        //$this->write();
        $this->content();
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
        //$this->pdf->SetTextColor(0,0,255);
        //$this->pdf->SetFont('','U');
        $content = gettext("Facture pour Mr ") . $user[0] . " " . $user[1]  .  gettext(" :");
        $this->pdf->Cell(0);
        $this->pdf->SetLeftMargin(40);
        $this->pdf->Write(20,$content);
        $this->table();


    }

    public function board(){

    }



}
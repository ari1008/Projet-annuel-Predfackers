<?php


namespace app\Models;

use APP\Table\Warehouse;
use FPDF;
use APP\Table\User;
use APP\Table\Address;
use APP\Models\Filesend;

class Billsend extends Filesend{
    protected $test;

    public function __construct(FPDF $pdf, $output, $id_address, $id_user, ){
        $output = $output . "Billing_Fredpacker.pdf";
        $this->output = $output;
        $this->id_address = $id_address;
        $this->id_user = $id_user;
        $this->pdf = $pdf;
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',14);
        $this->header();

    }


}
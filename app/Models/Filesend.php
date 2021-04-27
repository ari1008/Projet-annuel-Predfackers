<?php
namespace app\Models;

use \FPDF;

class Filesend{
    public function __construct(  FPDF $pdf, $output){

        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output($output, "F");
    }




}
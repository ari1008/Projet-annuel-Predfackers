<?php
namespace app\Models;

use APP\Table\Warehouse;
use \FPDF;
use APP\Table\User;
use APP\Table\Address;


class Filesend{
    private $pdf;
    private $output;
    private $id_address;
    private $id_user;
    private $id_warehouse;

    public function __construct(  FPDF $pdf, $output, $id_address, $id_user, $id_warehouse){
        $this->pdf = $pdf;
        $this->output = $output;
        $this->id_address = $id_address;
        $this->id_user = $id_user;
        $this->id_warehouse = $id_warehouse;
    }

    public function  setAddressRecipient(Address $address){
        $address->getPdo();
        $result = $address->idSelect($this->id_address, $this->id_user);
        return $result;
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
        $userResult = $this->utility(new User());
        $warehouseResult = $this->warehouse(new Warehouse());
        $addressResult = $this->setAddressRecipient(new Address()) ;

        var_dump($warehouseResult);
        var_dump($addressResult);
        $header = array('Expediteur','Destinataire');
    }


    // Tableau amélioré
    function ImprovedTable($header, $addressResult,$warehouseResult){
        // Largeurs des colonnes
        $w = array(45, 45);
        // En-tête

        $this->pdf->Ln();
        // Données
       for($i=0; $i<7;$i++){
           $this->pdf->Cell($addressResult[$i],$warehouseResult[$i]);
       }
        // Trait de terminaison
        $this->pdf->Cell(array_sum($w),0,'','T');
    }




}
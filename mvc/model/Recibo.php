<?php


Class Recibo {

    public $folio;
    public $monto;

    public function __construct($_folio, $_monto){
        
        $this->folio = $_folio;
        $this->monto = $_monto;

    }

    public function getfullFolio():string{
        return $this->folio . "-" . rand(0,100);
    }
    


}
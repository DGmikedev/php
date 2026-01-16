<?php

    require BASE_PATH . '/model/Recibo.php';
    
    class ReciboController {

        public $recibo;

        public function __construct(int $folio, float $monto){
            
            $this->recibo = new Recibo($folio, $monto);
        
        }

        function calcImpstsRecibo(float $_monto):float{
            return $_monto * 1.16;
        }

        function setFechaRecibo():string{
            return date("d-m-y");
        }

        function setDataRecibo():Array{

            

            $total = $this->calcImpstsRecibo($this->recibo->monto);

            return [
                "fullfolio"=>$this->recibo->getfullFolio(), 
                "total" => $total, 
                "monto" => $this->recibo->monto, 
                "fecha" => $this->setFechaRecibo()
            ];
        }
    
        public function getRecibo(){
            $data = $this->setDataRecibo();
            require BASE_PATH . '/view/viewRecibo.php';
        }

        


    }

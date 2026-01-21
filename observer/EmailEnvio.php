<?php

class EmailEnvio implements ObserverInterface
{
    public function update( string $event, mixed $data ):void
    {
        if($event === 'user_registed'){
            echo "Enviando correo a { ".$data['email']." } <br>";
        }
    }
}

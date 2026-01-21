<?php

class LogCreation implements ObserverInterface
{
    public function update( string $event, mixed $data ):void
    {
        if($event === 'user_registed'){
            echo "Log: Usuario { ".$data['name']." } creado <br>";
        }
    }
}

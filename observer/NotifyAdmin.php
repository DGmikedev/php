<?php

class NotifyAdmin implements ObserverInterface
{
    public function update( string $event, mixed $data ):void
    {
        if($event === 'user_registed'){
            echo "Admin notificado <br>";
        }
    }
}

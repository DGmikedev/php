<?php

require __DIR__ . "\interfaces\SubjectInterface.php";
require __DIR__ . "\interfaces\ObserverInterface.php";

class User implements SubjectInterface
{
    private array $observers = [];

    public function attach(ObserverInterface $observer):void
    {
        $this->observers[] = $observer;
    }

    public function detach(ObserverInterface $observer):void
    {
        $this->observers = array_filter(
            $this->observers, 
            fn($obs) => $obs !== $observer
        );
    }

    public function notify(string $event, mixed $data ):void
    {
        foreach($this->observers as $observer){
            $observer->update($event, $data);
        }
    }

    public function register(string $name, string $email):void
    {
        echo "Usuario $name registrado <br>";
        
        $this->notify('user_registed', [
            'name'  => $name,
            'email' => $email
        ]);
    }
}

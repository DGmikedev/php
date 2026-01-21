<?php

class PrinterService
{
    private NotifierInterface $notifier; 

    public function __construct( NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function notificar(string $text):void{
        $this->notifier->notify($text);
    }
}

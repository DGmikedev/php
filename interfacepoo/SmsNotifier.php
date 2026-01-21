<?php

require_once __DIR__ . "\NotifierInterface.php";

class SmsNotifier implements NotifierInterface
{
     public function notify(string $text):void{
        echo "SMS:: === $text ===";
    }
}

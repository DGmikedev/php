<?php

require_once __DIR__ . "\NotifierInterface.php";

class EmailNotifier implements NotifierInterface
{
    public function notify(string $text):void{
        echo "EMAIL:: === $text ===";
    }
}
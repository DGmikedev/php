<?php

namespace App\Clases;

use App\Interfaces\LogInterface;


class Log implements LogInterface
{ 
    public function printText(string $text):void
    {
        echo "=== $text ===";
    }
}
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Clases\Log;

$log = new Log();

$log->printText("texto de prueba para rastrear flujo de carpetas con psr-4");

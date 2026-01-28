<?php

require __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Log;

$log = new Log();

echo "[".$log->getDate()."] Lorem ipsum dolor, sit amet consectetur ";
/*

echo "<br>";
echo $log->setTiemStampNow(1);
echo "<br>";
echo $log->setTiemStampNow(2);
echo "<br>";
echo $log->setLevel(0);
*/
/*
header('Content-Type: application/json');

// Simulación de datos (puede venir de DB)
$locations = [
    [
        'name' => 'Zócalo CDMX',
        'lat' => 19.4326,
        'lng' => -99.1332
    ],
    [
        'name' => 'Chapultepec',
        'lat' => 19.4204,
        'lng' => -99.1819
    ],
    [
        'name' => 'Coyoacán',
        'lat' => 19.3467,
        'lng' => -99.1617
    ]
];

echo json_encode($locations);
*/

<?php

require __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Log;

use App\Infrastructure\LogApi;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;
use App\Domain\Enums\ServiceFormatEnum;
use App\Domain\Enums\EnviromentFormatEnum;

use App\Domain\Enums\LineLogEnum;



$dateTime = new \DateTimeImmutable(
    datetime: "now",
    timezone: new \DateTimeZone("America/Mazatlan")
);

$log =  new LogApi(
                $dateTime,
                LevelFormatEnum::INFO,
                EnviromentFormatEnum::DEV
            );
$log->setDate();

/*
$log =  new Log(
                $dateTime,
                DateFormatEnum::LOGSTD1, //$dateTime, 
                LevelFormatEnum::INFO,
                ServiceFormatEnum::API,
                EnviromentFormatEnum::DEV
            );

$log->write("Linea de prueba.1");
$log->write("Linea de prueba.2");
echo printf(LineLogEnum::API->lnWrite(), $dateTime->format(DATE_ATOM));
*/
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Log;

use App\Infrastructure\LogApi;
use App\Infrastructure\LogServer;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;
use App\Domain\Enums\ServiceFormatEnum;
use App\Domain\Enums\EnviromentFormatEnum;

use App\Domain\Enums\LineLogEnum;



$dateTime = new \DateTimeImmutable(
    datetime: "now",
    timezone: new \DateTimeZone("America/Mazatlan")
);

// API LOG
$apilog =  new LogApi( $dateTime, LevelFormatEnum::INFO, EnviromentFormatEnum::DEV );

$rspns = ['method'=> 'GET','endpoint'=> '/api/users','status'=> '201','respn_time'=>'120ms','ip'=>'189.203.249.123','user_id'=>'45','respns'=>'data_response' ];
$apilog->apiwrite($rspns);
$rspns = [ 'method'=> 'POST', 'endpoint'=> '/api/user/{125}', 'status'=> '201', 'respn_time'=> '120ms', 'ip'=> '189.203.249.123', 'user_id'=> '45', 'respns'=> 'success' ];
$apilog->apiwrite($rspns);

echo "<br>===========================================<br>";

// SER_ERR
$logServ = new LogServer($dateTime, LevelFormatEnum::INFO, EnviromentFormatEnum::DEV );
$logServ->serverwrite();



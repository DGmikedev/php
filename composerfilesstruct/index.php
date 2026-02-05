<?php

require __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Log;

use App\Infrastructure\LogApi;
use App\Infrastructure\LogCron;
use App\Infrastructure\LogFile;

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
$logServ = new LogCron($dateTime, LevelFormatEnum::INFO, EnviromentFormatEnum::DEV );
$hora = DateFormatEnum::SHRTDEU->eformat($dateTime);
   try{
        // hacer algo
        $logServ->serverwrite("Mensaje de EXITO en tarea de servidor");
        throw new Exception("error cod #456 - $hora");
    }
    catch(Exception $e){
        $logServ->serverwrite("Error al hacer la tarea: [". $e->getMessage() . "]");
    }finally{
        $logServ->serverwrite("FIN de tarea: [#Errores: 1]");
    }

echo "<br>===========================================<br>";

$logWorker = new LogFile($dateTime, LevelFormatEnum::WARNING, EnviromentFormatEnum::DEV);

    $arWorker = [
        "action" => "CREATE_FILE",
        "path" => "/storage/reports/report_123.pdf",
        "size" => "1.4MB",
        "user_id" => "45",
        "status" => "SUCCESS",
    ];

    $logWorker->workerwrite($arWorker);

    $arWorker = [
        "action" => "ERASE_FILE",
        "path" => "/storage/reports/report_88.pdf",
        "size" => "1.4MB",
        "user_id" => "888",
        "status" => "SUCCESS",
    ];

    $logWorker->workerwrite($arWorker);

echo "<br>===========================================<br>";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDG | <?= $hora ?></title>
</head>
<style>
    body{
        background-color:black;
        color:#ff8;
    }
</style>
<body>
    <h3>PRUEBA LOG 1.0 -- <?= $hora ?> --</h3>
</body>
</html>

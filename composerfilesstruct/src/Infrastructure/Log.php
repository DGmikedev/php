<?php

namespace App\Infrastructure;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;      // INFO | WARNING | ERROR | CRITICAL
use App\Domain\Enums\EnviromentFormatEnum; // DEV  | STAGING | PROD
use App\Domain\Enums\ServiceFormatEnum;    // API  | WORKER  | CRON

use Carbon\Carbon;

class Log
{
    private Carbon $dateNow;
    private string $request_id;
    private string $message;
    private string $context;

    public function __construct(){
        $this->dateNow = Carbon::now()->locale('es_MX');
    }
    
    public function getDate(): string{


        echo strtoupper(LevelFormatEnum::ERROR->value) . "<br>";
        echo strtoupper(EnviromentFormatEnum::DEV->value) . "<br>";
        echo strtoupper(ServiceFormatEnum::API->value) . "<br>";

        return  DateFormatEnum::LOGSTD1->format($this->dateNow);

    }

}
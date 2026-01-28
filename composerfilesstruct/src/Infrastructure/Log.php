<?php

namespace App\Infrastructure;

// use App\Domain\Enums\DateFormatEnum;
// use App\Domain\Enums\LevelFormatEnum;      // INFO | WARNING | ERROR | CRITICAL
// use App\Domain\Enums\EnviromentFormatEnum; // DEV  | STAGING | PROD
// use App\Domain\Enums\ServiceFormatEnum;    // API  | WORKER  | CRON

class Log
{
    private \DateTimeImmutable $dateNow;
    private string $dateLog;
    private string $request_id;
    private string $message;
    private string $context;

    public function __construct($localZone = 'America/Mazatlan'){

        $this->dateNow = new \DateTimeImmutable( 
            datetime: 'now', 
            timezone: new \DateTimeZone($localZone) 
        );

        $this->dateLog = DateFormatEnum::LOGSTD1->eformat($this->dateNow);

    }
    
    public function getDateLogStd1(): string{ return $this->dateLog }
    public function getEnviroment(string $env): string{ 
        return match($env){
            case ''
        };
     }

}
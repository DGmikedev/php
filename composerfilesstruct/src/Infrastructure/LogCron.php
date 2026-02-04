<?php

namespace App\infrastructure;

use App\Infrastructure\Log;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;
use App\Domain\Enums\ServiceFormatEnum;
use App\Domain\Enums\EnviromentFormatEnum;
use App\Domain\Enums\LineLogEnum;

class LogCron extends Log
{

    private DateFormatEnum $logDate;

   public function __construct(
        private \DateTimeImmutable   $dateNow,
        private LevelFormatEnum      $level,
        private EnviromentFormatEnum $enviroment
    ){
        $this->logDate = DateFormatEnum::LOGSTD1;

        parent::__construct( $dateNow, $this->logDate, $level, ServiceFormatEnum::CRON, $enviroment);
    }

    public function serverwrite($msg):void{

        $this->write(sprintf(
                    LineLogEnum::SERVER->getLine(), 
                    $this->logDate->eformat($this->dateNow), 
                    $msg
                )
            ); 
    }

}
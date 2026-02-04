<?php

namespace App\Infrastructure;

use App\Infrastructure\Log;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;
use App\Domain\Enums\ServiceFormatEnum;
use App\Domain\Enums\EnviromentFormatEnum;
use App\Domain\Enums\LineLogEnum;


class LogFile extends Log
{
    private DateFormatEnum $logDate;

    public function __construct(
        private \DateTimeImmutable   $dateNow,
        private LevelFormatEnum      $level,
        private EnviromentFormatEnum $enviroment
    ){
        $this->logDate = DateFormatEnum::LOGSTD1;
        parent::__construct( $dateNow, $this->logDate, $level, ServiceFormatEnum::FILE, $enviroment);
    }

    public function workerwrite($array):void{

        $this->write(sprintf(
                        LineLogEnum::FILE->getLine(), 
                        $this->logDate->eformat($this->dateNow), 
                        $array['action'],
                        $array['path'],
                        $array['size'],
                        $array['user_id'],
                        $array['status'],
                    )
                );
    }
}

<?php

namespace App\infrastructure;

use App\Infrastructure\Log;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;
use App\Domain\Enums\ServiceFormatEnum;
use App\Domain\Enums\EnviromentFormatEnum;
use App\Domain\Enums\LineLogEnum;

class LogServer extends Log
{

    private DateFormatEnum $logDate;

   public function __construct(
        private \DateTimeImmutable   $dateNow,
        private LevelFormatEnum      $level,
        private EnviromentFormatEnum $enviroment
    ){
        $this->logDate = DateFormatEnum::LOGSTD1;

        parent::__construct( $dateNow, $this->logDate, $level, ServiceFormatEnum::SERVER, $enviroment);
    }

    public function serverwrite():void{

        echo "SERVER LOG--";

    /*  $this->write(sprintf(
                    LineLogEnum::API->getLine(), 
                    $this->logDate->eformat($this->dateNow), 
                    $array['method'],
                    $array['endpoint'],
                    $array['status'],
                    $array['respn_time'],
                    $array['ip'],
                    $array['user_id'],
                    $array['respns'],
                )
            );   */
}

}
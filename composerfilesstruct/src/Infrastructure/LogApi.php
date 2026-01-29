<?php

namespace App\Infrastructure;

use App\Infrastructure\Log;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;
use App\Domain\Enums\ServiceFormatEnum;
use App\Domain\Enums\EnviromentFormatEnum;
use App\Domain\Enums\LineLogEnum;


class LogApi extends Log
{

    private DateFormatEnum $logDate;

    public function __construct(
        private \DateTimeImmutable   $dateNow,
        private LevelFormatEnum      $level,
        private EnviromentFormatEnum $enviroment
    ){
        $this->logDate = DateFormatEnum::LOGSTD1;

        parent::__construct( $dateNow, $this->logDate, $level, ServiceFormatEnum::API, $enviroment);
    }

    public function setDate(){
        // $date = DateFormatEnum::LOGSTD1->eformat($this->dateNow);
        $method='POST';
        $endpoint='/api/users';
        $status='201';
        $response_time='120ms';
        $ip='189.203.xxx.xxx';
        $user_id='45';
        $request_id='abc123';

    echo sprintf(LineLogEnum::API->getLine(), 
            $this->logDate->eformat($this->dateNow), 
            $method,
            $endpoint,
            $status,
            $response_time,
            $ip,
            $user_id,
            $request_id
        );
    }

    

    /*
[fecha] 
INFO 
method=POST 
endpoint=/api/users 
status=201
response_time=120ms
ip=189.203.xxx.xxx
user_id=45
request_id=abc123",
    */


}
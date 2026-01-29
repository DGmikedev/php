<?php

namespace App\Infrastructure;

use App\Domain\Enums\DateFormatEnum;
use App\Domain\Enums\LevelFormatEnum;      // INFO | WARNING | ERROR | CRITICAL
use App\Domain\Enums\ServiceFormatEnum;    // API  | WORKER  | CRON
use App\Domain\Enums\EnviromentFormatEnum; // DEV  | STAGING | PROD

class Log 
{
    public function __construct(
        private \DateTimeImmutable   $dateNow,
        private DateFormatEnum       $dateFromat,
        private LevelFormatEnum      $level,
        private ServiceFormatEnum    $service,
        private EnviromentFormatEnum $enviroment
    ){
        $this->headerLog();
    }

    public function headerLog():void{ 
        $head = sprintf('<br>[%s] %s | %s | %s <br><br>',
                    $this->dateFromat->eformat($this->dateNow),
                    $this->level->value,
                    $this->service->value,
                    $this->enviroment->value,
                );
        $this->write($head);
    }

    public function write(string $text): void{ 
        echo  $text;
    }

}
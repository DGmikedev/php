<?php

namespace App\Infrastructure;

use App\Domain\Enums\DateFormat;

use Carbon\Carbon;

class Log
{
    private Carbon $dateNow;
    
    public function __construct(){
        $this->dateNow = Carbon::now()->locale('es_MX');
    }
    
    public function getDate(): string{
        return  DateFormat::LOGSTD1->format($this->dateNow);

    }

}
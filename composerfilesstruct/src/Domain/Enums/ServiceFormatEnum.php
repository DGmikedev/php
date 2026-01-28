<?php

namespace App\Domain\Enums;

enum ServiceFormatEnum: string
{

    case API    = "API";
    case WORKER = "WORKER";
    case CRON   = "CRON";

}

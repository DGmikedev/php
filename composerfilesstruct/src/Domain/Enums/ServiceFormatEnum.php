<?php

namespace App\Domain\Enums;

enum ServiceFormatEnum: string
{

    case API    = "api";
    case WORKER = "worker";
    case CRON   = "cron";

}

<?php

namespace App\Domain\Enums;

enum ServiceFormatEnum: string
{

    case API    = "API";
    case FILE = "FILE";
    case CRON   = "CRON";

}

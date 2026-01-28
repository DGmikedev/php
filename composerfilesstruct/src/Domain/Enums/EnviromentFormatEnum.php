<?php

namespace App\Domain\Enums;

enum EnviromentFormatEnum: string
{
    case DEV     = "DEV";
    case STAGING = "STAGING";
    case PROD    = "PROD";
}

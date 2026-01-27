<?php

namespace App\Domain\Enums;

enum EnviromentFormatEnum: string
{
    case DEV     = "dev";
    case STAGING = "staging ";
    case PROD    = "prod";
}

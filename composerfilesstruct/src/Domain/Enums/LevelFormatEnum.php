<?php

namespace App\Domain\Enums;

/**
 * Tipo de nivel en LOGs
 * INFO / WARNING / ERROR / CRITICAL
 */

enum LevelFormatEnum: string
{
    case INFO     = 'INFO';
    case WARNING  = 'WARNING';
    case ERROR    = 'ERROR';
    case CRITICAL = 'CRITICAL';

}

<?php

namespace App\Domain\Enums;

/**
 * Tipo de nivel en LOGs
 * INFO / WARNING / ERROR / CRITICAL
 */

enum LevelFormatEnum: string
{
    case INFO     = 'info';
    case WARNING  = 'warning';
    case ERROR    = 'error';
    case CRITICAL = 'critical';

}

<?php

namespace App\Infrastructure;


class Log
{

    public static function setTiemStampNow($text): array{
        $fecha = "[Thu Jan 22 16:19:19 2026]";
        return [$fecha, $fecha ." ".$text];
    }

}
<?php

enum EstatusTarjetaEnum: int
{
    case BACKLOG        = 0;      // "backlog",
    case IDENTIFICACION = 1;      // "identificacion y analisis",
    case ANALISISEPICAS = 2;      // "analisis de epicas",
    case PRIORIZACION   = 3;      // "priorizacion",
    case ALINEACION     = 4;      // "alineación y planeación",
    case IMPLEMENTACION = 5;      // "implementación"
    case DONE           = 6;      // "terminado"

    public function fullname(): string{
        return match($this){
            self::BACKLOG        => "backlog",
            self::IDENTIFICACION => "identificacion y analisis",
            self::ANALISISEPICAS => "analisis de epicas",
            self::PRIORIZACION   => "priorizacion",
            self::ALINEACION     => "alineación y planeación",
            self::IMPLEMENTACION => "implementación",
            self::DONE           => "terminado"
        };
    }
}

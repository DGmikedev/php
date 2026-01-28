<?php

namespace App\Domain\Enums;

enum DateFormatEnum: string
{
    // ----- FORMATOS BASE DE PHP

    case DATE_ATOM    = "ATOM";        //  2026-01-28T00:03:59+00:00
    case DATE_COOKIE  = "COOKIE";      //  Wednesday, 28-Jan-2026 00:03:59 UTC
    case DATE_ISO8601 = "ISO8601";     //  2026-01-28T00:03:59+0000
    case DATE_RFC822  = "RFC822";      //  Wed, 28 Jan 26 00:03:59 +0000
    case DATE_RFC850  = "RFC850";      //  Wednesday, 28-Jan-26 00:03:59 UTC
    case DATE_RFC1036 = "RFC1036";     //  Wed, 28 Jan 26 00:03:59 +0000
    case DATE_RFC1123 = "RFC1123";     //  Wed, 28 Jan 2026 00:03:59 +0000
    case DATE_RFC2822 = "RFC2822";     //  Wed, 28 Jan 2026 00:03:59 +0000
    case DATE_RFC3339 = "RFC3339";     //  2026-01-28T00:03:59+00:00
    case DATE_RFC7231 = "RFC7231";     //  Wed, 28 Jan 2026 00:03:59 GMT
    case DATE_RSS     = "RSS";         //  Wed, 28 Jan 2026 00:03:59 +0000
    case DATE_W3C     = "W3C";         //  2026-01-28T00:03:59+00:00

    // ---- FORMATOS PERSONALIZADOS  -- EN CAPA VISTA PASA A ESPAÑOL DEPENDIENDO DEL LENGUAJE A MOSTRAR

    case PRECISO        = 'preciso';   //  2026-01-28 12:0101:59
    case MXDOC          = 'mxdoc';     //  28 de January del 2026
    case SHRTDMX        = 'shrtdmx';   //  28/01/2026
    case SHRTDEU        = 'shrtdeu';   //  01/28/2026
    case DOCEU          = 'doceu';     //  January 28, 2026
    case FILENAME       = 'filename';  //  20260128120159
    case LOGSTD1        = 'logstd1';   //  Wed Jan 28 12:01:59 2026


    public function eformat(\DateTimeImmutable $date){

        return match($this){

            self::DATE_ATOM    => $date->format(DATE_ATOM),
            self::DATE_COOKIE  => $date->format(DATE_COOKIE),
            self::DATE_ISO8601 => $date->format(DATE_ISO8601),
            self::DATE_RFC822  => $date->format(DATE_RFC822),
            self::DATE_RFC850  => $date->format(DATE_RFC850),
            self::DATE_RFC1036 => $date->format(DATE_RFC1036),
            self::DATE_RFC1123 => $date->format(DATE_RFC1123),
            self::DATE_RFC2822 => $date->format(DATE_RFC2822),
            self::DATE_RFC3339 => $date->format(DATE_RFC3339),
            self::DATE_RFC7231 => $date->format(DATE_RFC7231),
            self::DATE_RSS     => $date->format(DATE_RSS),
            self::DATE_W3C     => $date->format(DATE_W3C),
            self::PRECISO      => $date->format('Y-m-d h:mm:s'),
            self::MXDOC        => $date->format('d \d\e F \d\e\l Y'),
            self::SHRTDMX      => $date->format('d/m/Y'),
            self::SHRTDEU      => $date->format('m/d/Y'),
            self::DOCEU        => $date->format('F d\, Y'),
            self::FILENAME     => $date->format('Ymdhms'),
            self::LOGSTD1      => $date->format('D M d h:m:s Y') 

        };
    }


/*
    private function setEULocale(Carbon $carbonObj): Carbon{
        return $carbonObj->locale('en_US');
    }
    private function mxdocAdj(string $date): string{
            $strdate = explode(" ",$date);
            return $strdate[0] ." ". $strdate[1] ." ". ucfirst($strdate[2]) ." ". 
                   $strdate[3] ." ". $strdate[4];
    }

    */
}

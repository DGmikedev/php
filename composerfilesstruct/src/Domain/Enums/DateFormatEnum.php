<?php

namespace App\Domain\Enums;

use Carbon\Carbon;

enum DateFormatEnum: string
{
    // ----- FORMATOS BASE DE PHP
    case ATOM           = 'atom';             // 2026-01-23T19:49:03+00:00
    case COOKIE         = 'cookie';           // Friday, 23-Jan-2026 19:47:56 UTC
    case ISO            = 'iso';              // 2026-01-23T19:47:39.240267Z
    case ISO8601        = 'Iso8601';          // 2026-01-23T19:47:19+00:00
    case ISO8601ZULU    = 'iso860Zulu';       // 2019-02-01T03:45:27Z
    case DTIMELOCAL     = 'DateTimeLocal';    // 2019-02-01T03:45:27
    case RFC822         = 'rfc822';           // Fri, 01 Feb 19 03:45:27 +0000
    case RFC850         = 'Rfc850';           // Friday, 01-Feb-19 03:45:27 UTC
    case RFC1036        = 'Rfc1036';          // Fri, 01 Feb 19 03:45:27 +0000
    case RFC1123        = 'Rfc1123';          // Fri, 01 Feb 2019 03:45:27 +0000
    case RFC2822        = 'Rfc2822';          // Fri, 01 Feb 2019 03:45:27 +0000
    case RFC3339        = 'Rfc3339';          // 2019-02-01T03:45:27+00:00
    case RFC7231        = 'Rfc7231';          // Fri, 01 Feb 2019 03:45:27 GMT
    case RSS            = 'Rss';              // Fri, 01 Feb 2019 03:45:27 +0000
    case W3C            = 'W3c';              // 2019-02-01T03:45:27+00:00

    // ----- FORMATOS PERSONALIZADOS          ////////////////////////////////

    case PRECISO        = 'preciso';          // 2026-1-23 7:02:55
    case MXDOC          = 'mxdoc';            // 23 de Enero del 2026
    case SHRTDMX        = 'shrtdmx';          // 23/1/2026
    case SHRTDEU        = 'shrtdeu';          // 1/23/2026
    case DOCEU          = 'doceu';            // January 23, 2026
    case FILENAME       = 'filename';         // 202612372040
    case LOGSTD1        = 'logstd1';          // Fri Jan 23 13:47:39 2026

    public function format(Carbon $dateNow){
        
        return match($this){
            self::ATOM        => $dateNow->toAtomString(),
            self::COOKIE      => $dateNow->toCookieString(),
            self::ISO         => $dateNow->toISOString(),
            self::ISO8601     => $dateNow->toIso8601String(),
            self::ISO8601ZULU => $dateNow->toIso8601ZuluString(),
            self::DTIMELOCAL  => $dateNow->toDateTimeLocalString(),
            self::RFC822   => $dateNow->toRfc822String(),
            self::RFC850   => $dateNow->toRfc850String(),
            self::RFC1036  => $dateNow->toRfc1036String(),
            self::RFC1123  => $dateNow->toRfc1123String(),
            self::RFC2822  => $dateNow->toRfc2822String(),
            self::RFC3339  => $dateNow->toRfc3339String(),
            self::RFC7231  => $dateNow->toRfc7231String(),
            self::RSS      => $dateNow->toRssString(),
            self::W3C      => $dateNow->toW3cString(),
            self::PRECISO  => $dateNow->isoFormat('Y-M-D h:mm:ss'),
            self::SHRTDMX  => $dateNow->isoFormat('D/M/YYYY'),
            self::SHRTDEU  => $dateNow->isoFormat('M/D/YYYY'),
            self::MXDOC    => $this->mxdocAdj($dateNow->isoFormat('D [de] MMMM [del] YYYY')),
            self::DOCEU    => $this->setEULocale($dateNow)->isoFormat('MMMM D, YYYY'),
            self::FILENAME => $dateNow->isoFormat('YYYYMDhmmss'),
            self::LOGSTD1  => $this->setEULocale($dateNow)->isoFormat('DDD MMM dd h:mm:ss Y') 
        };
    }

    private function setEULocale(Carbon $carbonObj): Carbon{
        return $carbonObj->locale('en_US');
    }
    private function mxdocAdj(string $date): string{
            $strdate = explode(" ",$date);
            return $strdate[0] ." ". $strdate[1] ." ". ucfirst($strdate[2]) ." ". 
                   $strdate[3] ." ". $strdate[4];
    }
}

<?php

namespace App\Clases;

use Carbon\Carbon;

// use App\Interfaces\LogInterface;

/*
API

Timestamp (fecha y hora)
Método HTTP (GET, POST, PUT, DELETE)
Endpoint accedido
Código de respuesta HTTP
Tiempo de respuesta
IP del cliente
User-Agent
ID de request / correlación
Errores o excepciones
Usuario autenticado (ID, no datos sensibles)

[2026-01-22 12:30:15] INFO [method=POST] [endpoint=/api/users] [status=201] [response_time=120ms] [ip=189.203.xxx.xxx] [user_id=45] [request_id=abc123]


SERVIDOR
Inicio y cierre de servicios
Errores fatales
Uso de recursos
Accesos al servidor
Fallos de conexión
Archivos no encontrados
Permisos

error
[Wed Jan 22 12:35:01 2026] [ PHP Fatal error: Uncaught TypeError: Argument must be string in /var/www/app/UserService.php:52 ]

log
[22/Jan/2026:12:35:01] [189.203.xxx.xxx] ["GET /index.php HTTP/1.1" 200 4521]


ARCHIVOS
Archivo creado / modificado / eliminado
Ruta completa
Usuario o proceso
Resultado (éxito / error)
Tamaño
Permisos
Motivo o contexto

SUCCESS
[2026-01-22 12:40:22] INFO action=CREATE_FILE path=/storage/reports/report_123.pdf size=1.4MB user_id=45 status=SUCCESS

ERROR
[2026-01-22 12:41:10] ERROR action=WRITE_FILE path=/storage/reports/report_124.pdf error=Permission denied



Estos campos deberían existir en cualquier log 
Campo       	Uso

timestamp   	Orden cronológico
level       	INFO / WARNING / ERROR / CRITICAL
service         API / WORKER / CRON
environment 	dev / staging / prod
request_id  	Rastrear una petición completa
message     	Descripción humana
context     	JSON con datos extra

*/


/**
 $dt->toAtomString() is the same as $dt->format(\DateTime::ATOM);
echo $dt->toAtomString();                // 2019-02-01T03:45:27+00:00
echo $dt->toCookieString();              // Friday, 01-Feb-2019 03:45:27 UTC

echo $dt->toIso8601String();             // 2019-02-01T03:45:27+00:00
// Be aware we chose to use the full-extended format of the ISO 8601 norm
// Natively, \DateTime::ISO8601 format is not compatible with ISO-8601 as it
// is explained here in the PHP documentation:
// https://php.net/manual/class.datetime.php#datetime.constants.iso8601
// We consider it as a PHP mistake and chose not to provide method for this
// format, but you still can use it this way:
echo $dt->format(\DateTime::ISO8601);    // 2019-02-01T03:45:27+0000

echo $dt->toISOString();                 // 2019-02-01T03:45:27.612584Z
echo $dt->toJSON();                      // 2019-02-01T03:45:27.612584Z

echo $dt->toIso8601ZuluString();         // 2019-02-01T03:45:27Z
echo $dt->toDateTimeLocalString();       // 2019-02-01T03:45:27
echo $dt->toRfc822String();              // Fri, 01 Feb 19 03:45:27 +0000
echo $dt->toRfc850String();              // Friday, 01-Feb-19 03:45:27 UTC
echo $dt->toRfc1036String();             // Fri, 01 Feb 19 03:45:27 +0000
echo $dt->toRfc1123String();             // Fri, 01 Feb 2019 03:45:27 +0000
echo $dt->toRfc2822String();             // Fri, 01 Feb 2019 03:45:27 +0000
echo $dt->toRfc3339String();             // 2019-02-01T03:45:27+00:00
echo $dt->toRfc7231String();             // Fri, 01 Feb 2019 03:45:27 GMT
echo $dt->toRssString();                 // Fri, 01 Feb 2019 03:45:27 +0000
echo $dt->toW3cString();                 // 2019-02-01T03:45:27+00:00
 */

class Log 
{ 
    
    public function setTiemStampNow(int $long, string $lngSelec = 'eng'):string
    {
        $formato = 'dddd MMMM D h:mm:ss YYYY';

        $frmt = match($long){

                  0 => 'Y-M-D',                   // iso 8601
                  1 => 'Y-M-D h:mm:ss',           // preciso
                  2 => 'Y-M-DTh:mm:ssZ',          // ISO 8601 + UTC
                  3 => 'D/M/YYYY',                // Corta c/diagonal MX
                  4 => 'M/D/YYYY',                // Corta c/diagonal EU
                  5 => 'D MMMM YYYY',             // Mes Legible 
                  6 => 'D | MMMM | YYYY',         // Mes Legible Mexico 
                  7 => 'MMMM D, YYYY',            // Doc inglés 
                  8 => 'YYYYMDhmmss',             // Nombres de archivo 

            default => 'dddd MMMM D h:mm:ss YYYY'

        };


        // YYYY-MM-DD
// 2026-01-22 - Bases de datos, APIs, ISO  - Estándar ISO 8601 (recomendado)



        $lengu = match($lngSelec){
            'esp' => 'es_MX',
            'eng' =>  'en_EU',
            default => 'es_MX'
        };

        $dateNow = Carbon::now()->locale($lengu);//->isoFormat($frmt);

        $s = 1;

        $date = match($s){
            0 => $dateNow->toAtomString(),
            1 => $dateNow->toRfc1123String(),
            default => null
        };

        echo $date;

        die("<br>##############");
        
        $dateNow = 
        $dateNow2 = Carbon::now()->locale($lengu)->isoFormat('Y-m-d\\TH:i:sP');
        
        echo $dateNow;
        echo "<br>";
        echo $dateNow2;

        $dateNow2 = explode(" ", $dateNow);



        // var_dump($dateNow2);


        die();


        $diaLetra = ucfirst($dateNow2[0]);
        $mesLetra = ucfirst($dateNow2[1]);

        $fecha = $diaLetra ." ". $mesLetra . " " . $dateNow2[2] . " " . $dateNow2[3] ." " . $dateNow2[4];

        echo $fecha;

        die();

        return match($long){
            0 => (string)date('D M j G:i:s Y'),
            1 => strtoupper(),
            2 => (string)date('d-m-Y'),
            default => "SIN TIMESTAMP"
        }; 
       
    }

    public function setLevel(int $level):string{

        return match($level){
            0 => "DEV",
            1 => "WARNING",
            2 => "ERROR",
            3 => "CRITICAL",
            default => "SIN NIVEL"
        };
    }
}

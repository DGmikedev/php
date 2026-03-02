<?php

include "./enums/EstatusTarjetaEnum.php";
include "./enums/DateFormatEnum.php";

class Tarjeta
{
    private EstatusTarjeta $estatus;
    private int    $personalAsignado;
    private int    $informador;
    private string $desarrollador;
    private string $fechaInicio;
    private string $fechaObjetivo;
    private string $fechaFin;
    private string $equipoAsignado;
    private string $categoriaCierre;
    private string $nombreDelServicio;
    private int    $idDeServicio;
    private string $descripción;
    private string $justificacionPorRCA;
    private string $subTareas;
    private string $actividadesVinculadas;

    public function __construct(EstatusTarjetaEnum $estatus){
        echo $estatus->fullname();
    }
}

$date = new \DateTimeImmutable(
    "now",
    new \DateTimeZone("America/Mazatlan"),
);

$estatus = EstatusTarjetaEnum::IDENTIFICACION; 

echo $date->format("2000-12-31");

$tarjeta = new Tarjeta($estatus);






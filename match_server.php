<?php 

$status_server =  $_SERVER['SERVER_NAME'];

echo "<h1>". strtoupper($status_server) . "</h1>";

$status = 400;

$result = match($status){
    400 => 'ERROR NO FOUND',
    500 => 'ERROR DE SERVIDOR',
    200 => 'OK',
    default => "SIN COINCIDENCIAS"
};

echo " <p>ESTATUS: <span style="."'color:red;'>".$result."</span> </p>";

?>

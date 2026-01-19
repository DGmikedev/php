<?php

require_once "../databases/MySQLConnection.php";
require_once "../databases/PostgreSQLConnection.php";

class DataBaseConnectionFactory
{
    public static function create(string $type): DataBaseConnectionInterface{

        return match($type){

            'mysql' => new MySQLConnection(),

            'postgresql' => new PostgreSQLConnection(),

            default => throw new InvalidArgumentException("Tipo de conección invalido")

        };
    }
}

$cnx = DataBaseConnectionFactory::create("mysql");

$credenciales = $cnx->connect();

// uso de las conexiones 

$cnx2 = new PDO($credenciales[0],$credenciales[1],$credenciales[2]);

$stmt = $cnx2->query("SELECT * FROM users;");

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['name'] . "<br>";
}



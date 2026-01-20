<?php

require_once "./DataBase.php";

$db = DataBase::getInstance()->getConnection();
$db2 = DataBase::getInstance()->getConnection();

$stmt = $db->query("SELECT NOW() as fecha;");

$result = $stmt ->fetch();

echo $result['fecha'] . "<br>";

var_dump($db === $db2);

echo "<br>";

// desearlizar no se permite
// echo unserialize(serialize(Database::getInstance()));

die("Termina proceso singleton");
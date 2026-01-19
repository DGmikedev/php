<?php

require_once __DIR__ . "\DataBaseConnectionInterface.php";

class MySQLConnection implements DataBaseConnectionInterface
{
    public function connect(): array{

        return ["mysql:host=localhost;dbname=php", "root", ""];
        
    }
}
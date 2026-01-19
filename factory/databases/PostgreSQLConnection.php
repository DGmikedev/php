<?php

require_once __DIR__ . "\DataBaseConnectionInterface.php";

class PostgreSQLConnection implements DataBaseConnectionInterface
{
    public function connect(): array
    {
        return ["posrgresql:host=localhost;dbname=php", "root", ""];
    }
}
<?php

class DataBase
{
    // si no existe es null
    private static ?DataBase $instance = null;

    // PDO a usar
    private PDO $connection;

    // credenciales
    private string $host    = "localhost";
    private string $db      = "php";
    private string $user    = "root";
    private string $pass    = "";
    private string $charset = "utf8mb4";

    private function __construct()
    {
        try{
            
            $dsn = "mysql:host={$this->host}; dbname={$this->db};charset={$this->charset}";
            
            $this->connection = new PDO(
                $dsn,
                $this->user,
                $this->pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false
                ]
            );
        }catch(PDOException $e){
            die("Error de conexción: ".$e->getMessage());
        }
    }

    // funcion para obtener la instancia
    public static function getInstance(): DataBase
    {
        if(self::$instance === null){

            self::$instance = new DataBase();

        }    

        return self::$instance;

    }

    // función para obtener la conexión
    public function getConnection(): PDO
    {

        return $this->connection;

    }

    // evita clonación
    private function __clone(){}

    // evita deserealización
    private function __wakeup()
    {

        throw new Exception("No esta permitido deserealizar la conexión");

    }


}
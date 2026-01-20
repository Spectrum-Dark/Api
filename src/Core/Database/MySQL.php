<?php

namespace App\Core\Database;
use PDO;

class MySQL
{
    private static $Instance = null;
    private $PDO;

    // Configuración de la base de datos
    private $Host = 'localhost';
    private $DB  = 'panel_fenix';
    private $User = 'root';
    private $Pass = '';
    private $Charset = 'utf8mb4';

    //evitar que se cree una nueva instancia con 'new'
    private function __construct()
    {
        $Conexion = "mysql:host=$this->Host;dbname=$this->DB;charset=$this->Charset";
        $Options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->PDO = new PDO($Conexion, $this->User, $this->Pass, $Options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    //evitar clonar la instancia
    private function __clone() {}

    //(Singleton)
    public static function GetInstance()
    {
        if (self::$Instance === null) {
            self::$Instance = new self();
        }
        return self::$Instance;
    }

    /* Consultas */
    public function Query($SQL, $Params = [])
    {
        try {
            // Prepara la sentencia
            $stmt = $this->PDO->prepare($SQL);
            // Ejecuta con los parámetros asignados
            $stmt->execute($Params);
            return $stmt;
        } catch (\PDOException $e) {
            throw new \Exception("Error en BD: " . $e->getMessage());
        }
    }
}

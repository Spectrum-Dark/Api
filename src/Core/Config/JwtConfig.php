<?php

namespace App\Core\Config;

class JwtConfig
{
    /* Cargamos todas las variables desde .env */
    
    public static function key(): string
    {
        return $_ENV['JWT_KEY'];
    }

    public static function alg(): string
    {
        return $_ENV['JWT_ALGO'];
    }
    
    public static function exp(): int
    {
        return (int) $_ENV['JWT_EXP'];
    }
}

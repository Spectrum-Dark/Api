<?php

namespace App\Core\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Core\Config\JwtConfig;

class JwtHandler
{
    /* Generamos un token */
    public static function Generate(array $data):string
    {
        $payload = [
          "iss" => $_ENV['APP_NAME'],
          "iat" => time(),
          "exp" => time() + + JwtConfig::exp(),
          "data" => $data
        ];

        return JWT::encode($payload,JwtConfig::key(),JwtConfig::alg()); 
    }

    /* Validamos el token */
    public static function Validate(string $token)
    {
        return JWT::decode($token,new key(JwtConfig::key(),JwtConfig::alg()));
    }
}

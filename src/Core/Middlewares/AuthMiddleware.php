<?php

namespace App\Core\Middlewares;

use App\Core\Auth\JwtHandler;
use Exception;
use App\Core\Helpers\Response;

class AuthMiddleware
{
    public static function handle()
    {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            Response::Json(401, "Token Requerido", []);
            exit;
        }

        $token = str_replace('Bearer ', '', $headers['Authorization']);

        try {
            return JwtHandler::Validate($token);
        } catch (Exception $e) {
            return Response::Json(401, "Token Invalido", []);
            exit;
        }
    }
}

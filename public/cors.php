<?php
// 1. Permitir acceso desde cualquier origen
header("Access-Control-Allow-Origin: *");

// 2. Permitir los métodos HTTP
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// 3. Permitir las cabeceras necesarias
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// 4. (Define que la respuesta es JSON y UTF-8)
header("Content-Type: application/json; charset=UTF-8");

// 5. Manejar la petición "Preflight" (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
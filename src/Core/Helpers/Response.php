<?php

namespace App\Core\Helpers;

class Response
{
    public static function Json(int $status, string $message, array $data = [])
    {
        http_response_code($status);

        $payload = [
            'status'  => $status >= 200 && $status < 300 ? 'success' : 'error',
            'message' => $message,
            'data'    => $data ?: null,
        ];
        echo json_encode($payload, JSON_THROW_ON_ERROR);
        exit;
    }
}

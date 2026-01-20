<?php

namespace App\Models;

class ApiModel
{
    public function Index()
    {
        $Api = [
            "ApiRest" => "Phoenix API",
            "Version" => "1.0.0",
            "Autor" => "Bryan MQ"
        ];

        return $Api;
    }
}

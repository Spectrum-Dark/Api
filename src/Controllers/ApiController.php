<?php

namespace App\Controllers;

use App\Core\Helpers\Response;
use App\Models\ApiModel;

class ApiController
{
    private $Model;

    public function __construct()
    {
        $this->Model = new ApiModel;
    }

    public function Index()
    {
        $Response = $this->Model->Index();
        Response::Json(200, "Hola Bienvenido Usuario", [$Response]);
    }
}

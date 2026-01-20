<?php

namespace App\Controllers;

use App\Core\Auth\JwtHandler;
use App\Core\Helpers\Response;
use App\Models\UserModel;

class UserController
{
    private $Model;
    public function __construct()
    {
        $this->Model = new UserModel;
    }

    public function Index()
    {
        return Response::Json(200, "Usuarios", $this->Model->ListarUsuarios());
    }

    public function Auth()
    {
        return Response::Json(200, "Autorizado", [JwtHandler::Generate($this->Model->Login())]);
    }
}

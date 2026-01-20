<?php

namespace App\Controllers;

use App\Core\Helpers\Response;
use App\Models\UserModel;

class UserController
{
    private $Model;
    public function __construct()
    {
        $this->Model = new UserModel;
    }

    public function Insert()
    {
        /* Capturamos los datos */
        $Data = file_get_contents('php://input');
        $Data = json_decode($Data, true);

        /* Validamos los datos */
        if (!isset($Data['name']) || !isset($Data['email']) || !isset($Data['password'])) {
            return Response::Json(400, "Faltan datos", [$Data]);
        }

        /* Hasheamos la contraseña */
        $Data['password'] = password_hash($Data['password'], PASSWORD_BCRYPT);

        /* Ejecutamos consulta */
        $Response = $this->Model->Insert_User($Data);
        $Response ? Response::Json(200, "Usuario creado con éxito", []) : Response::Json(500, "Error al crear el usuario", []);
    }

    public function Update()
    {
        /* Capturamos los datos */
        $Data = file_get_contents('php://input');
        $Data = json_decode($Data, true);

        /* Validamos los datos */
        if (!isset($Data['id']) || !isset($Data['name']) || !isset($Data['email']) || !isset($Data['password'])) {
            return Response::Json(400, "Faltan datos", [$Data]);
        }

        /* Hasheamos la contraseña */
        $Data['password'] = password_hash($Data['password'], PASSWORD_BCRYPT);

        /* Ejecutamos consulta */
        $Response = $this->Model->Update_User($Data);
        $Response ? Response::Json(200, "Usuario actualizado con éxito", []) : Response::Json(500, "Error al actualizar el usuario", []);
    }

    public function Delete()
    {
        /* Capturamos los datos */
        $Data = file_get_contents('php://input');
        $Data = json_decode($Data, true);

        /* Validamos los datos */
        if (!isset($Data['id'])) {
            return Response::Json(400, "Faltan datos", [$Data]);
        }

        /* Ejecutamos consulta */
        $Response = $this->Model->Delete_User($Data);
        $Response ? Response::Json(200, "Usuario eliminado con éxito", []) : Response::Json(500, "Error al eliminar el usuario", []);
    }

    public function Show()
    {
        /* Capturamos los datos */
        $Data = file_get_contents('php://input');
        $Data = json_decode($Data, true);

        /* Validamos los datos */
        if (!isset($Data['name'])) {
            return Response::Json(400, "Faltan datos", [$Data]);
        }

        /* Ejecutamos consulta */
        $Response = $this->Model->Show_User($Data);
        $Response ? Response::Json(200, "Usuario encontrado con éxito", $Response->fetch(2)) : Response::Json(500, "Error al encontrar el usuario", []);
    }
}

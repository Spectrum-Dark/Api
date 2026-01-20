<?php

namespace App\Models;

class UserModel
{
    public function ListarUsuarios()
    {
        $Users = [
            [
                "id" => 1,
                "name" => "Juan",
                "email" => "juan@example.com"
            ],
            [
                "id" => 2,
                "name" => "Maria",
                "email" => "maria@example.com"
            ]
        ];
        return $Users;
    }

    public function Login()
    {
        $Users = [
            [
                "id" => 1,
                "name" => "Juan",
                "email" => "juan@example.com"
            ],
        ];

        return $Users;
    }
}

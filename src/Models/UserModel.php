<?php

namespace App\Models;

use App\Core\Database\MySQL;

class UserModel
{
    private $MySQL;

    public function __construct()
    {
        $this->MySQL = MySQL::GetInstance();
    }

    public function Insert_User(array $Data)
    {
        $Sql = "CALL sp_insert_user(?, ?, ?);";
        $Params = [
            $Data['name'],
            $Data['email'],
            $Data['password']
        ];
        $Result = $this->MySQL->Query($Sql, $Params);
        return $Result;
    }

    public function Update_User(array $Data)
    {
        $Sql = "CALL sp_update_user(?, ?, ?, ?);";
        $Params = [
            $Data['id'],
            $Data['name'],
            $Data['email'],
            $Data['password']
        ];
        $Result = $this->MySQL->Query($Sql, $Params);
        return $Result;
    }

    public function Delete_User(array $Data)
    {
        $Sql = "CALL sp_delete_user(?);";
        $Params = [
            $Data['id']
        ];
        $Result = $this->MySQL->Query($Sql, $Params);
        return $Result;
    }

    public function Show_User(array $Data)
    {
        $Sql = "CALL sp_get_user_by_name(?);";
        $Params = [
            $Data['name']
        ];
        $Result = $this->MySQL->Query($Sql, $Params);
        return $Result;
    }
}

<?php

/**
 * @description Controlador de usuarios VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 20.11.2020
 */

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\User;

class UserController extends Controller
{
    public static function getClients()
    {
        $users = Client::all();
        return $users;
    }

    public static function getEmployees()
    {
        $users = Employee::all();
        return $users;
    }

}

<?php

/**
 * @description Controlador de administracion VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 21.11.2020
 */

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.admin', [
            'clients' => UserController::getClients(),
            'employees' => UserController::getEmployees(),
        ]);
    }
}

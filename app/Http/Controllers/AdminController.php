<?php

/**
 * @description Controlador de administracion VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 21.11.2020
 */

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Employee;
use App\Http\Controllers\UserController;
use Datatables;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.admin');
    }
    
    public function loadClients(){
        $clients = User::has('clients')->get();
        $view = view('admin.tablas.client')->with('clients', $clients)->render();                
        return $view;
    }

    public function loadEmployees(){
        $employees = User::has('employees')->get();
        $view = view('admin.tablas.employee')->with('employees', $employees)->render();                
        return $view;
    }
}

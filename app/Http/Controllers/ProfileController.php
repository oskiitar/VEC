<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Employee;

class ProfileController extends Controller
{
    public function showProfile(){
        return view('perfil');
    }

    public function loadUser($id){
        $user = User::with('client')->find($id);

        if($user->employee){
            $user = User::with('employee')->find($id);
        }

        return $user;
    }
}

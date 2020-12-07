<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Client;
use App\Employee;

class ProfileController extends Controller
{

    /**
     * Get a validator for an incoming update user request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'surname' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'digits_between:9,10'],
        ]);
    }

    /**
     * Get a validator for an incoming update password request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorPass(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'max:25', 'confirmed'],
        ]);
    }

    /**
     * Get a validator for an incoming update client request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorClient(array $data)
    {
        return Validator::make($data, [            
            'address' => ['required', 'string', 'max:255'],  
        ]);
    }

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

    /**
     * Edit a user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $request)
    {
        $this->validator($request->all())->validate();

        DB::transaction(function () use ($request) {

            $user = User::find($request->id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->tel = $request->tel;

            if ($request->password && $request->password != '') {
                $this->validatorPass($request->all())->validate();

                $user->password = Hash::make($request->password);
            }

            if ($request->address && $request->address != '') {
                $this->validatorClient($request->all())->validate();

                $client = Client::find($request->id);
                $client->address = $request->address;
                $client->save();                  
            } 
    
            $user->save();
        });

        return redirect('/');
    }
}

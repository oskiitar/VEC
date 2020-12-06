<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Client;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'surname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'before:-18 years'],
            'tel' => ['required', 'digits_between:9,10'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:25', 'confirmed'],
            'address' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'birthday' => $data['birthday'],
                'tel' => $data['tel'],
                'password' => Hash::make($data['password']),
            ]);

                $client = new Client;
                $client->address = $data['address'];
                $client->created_at = now();
    
                $user->client()->save($client);                  

            return $user;
        });

        return $user;

    }

    /**
     * Edit a user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(array $data)
    {
        $user = DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'birthday' => $data['birthday'],
                'tel' => $data['tel'],
                'password' => Hash::make($data['password']),
            ]);

                $client = new Client;
                $client->address = $data['address'];
                $client->created_at = now();
    
                $user->client()->save($client);                  

            return $user;
        });

        return $user;
    }
}

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorClient(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'surname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'before:-18 years'],
            'tel' => ['required', 'string', 'min:9', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'address' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorClientUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'surname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'before:-18 years'],
            'tel' => ['required', 'string', 'min:9', 'max:12'],
            'address' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorEmployee(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'surname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'before:-18 years'],
            'tel' => ['required', 'string', 'min:9', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'contract_start' => ['required', 'date', 'after:-12 months']
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorEmployeeUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:150'],
            'surname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', 'before:-18 years'],
            'tel' => ['required', 'string', 'min:9', 'max:12'],
            'contract_start' => ['required', 'date', 'after:-12 months'],
        ]);
    }

    public function show()
    {
        return view('admin.admin');
    }
    
    public function loadClients(){
        $clients = User::has('client')->get();
        $view = view('admin.tablas.client')->with('clients', $clients)->render();                
        return $view;
    }

    public function loadEmployees(){
        $employees = User::has('employee')->get();
        $view = view('admin.tablas.employee')->with('employees', $employees)->render();                
        return $view;
    }

    public function clientAdd(Request $request){

        $this->validatorClient($request->all())->validate();   
         
        DB::transaction(function() use ($request) {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'tel' => $request->tel,
                'password' => Hash::make($request->password),
            ]);                
    
            $client = new Client;
            $client->address = $request->address;
            $client->created_at = now();
        
            $user->client()->save($client);
        }); 
    }

    public function employeeAdd(Request $request){

        $this->validatorEmployee($request->all())->validate();

        DB::transaction(function() use ($request) {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'tel' => $request->tel,
                'password' => Hash::make($request->password),
                'is_admin' => $request->is_admin
            ]);                
    
            $employee = new Employee;
            $employee->fill($request->all());
        
            $user->employee()->save($employee);
        });                                 
    }

    public function clientUpdate(Request $request){

        $this->validatorClientUpdate($request->all())->validate();

        $user = User::find($request->id);
        $user->fill($request->all());
        $user->client->fill($request->all());
        $user->push();     
    }

    public function employeeUpdate(Request $request){

        $this->validatorEmployeeUpdate($request->all())->validate();

        $user = User::find($request->id);
        $user->fill($request->all());
        $user->employee->fill($request->all());
        $user->push(); 
    }

    public function userDelete($id){
        User::find($id)->delete();
    }
}

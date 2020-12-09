<?php

/**
 * @description Controlador de administracion VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 09.12.2020
 */

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Employee;
use App\Reserve;
use App\Renting;
use App\Pay;
use App\Payway;
use App\Invoice;
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

    /**
     * Devuelve la vista admin
     */
    public function show()
    {
        return view('admin.admin');
    }
    
    /**
     * Devuelve todos los clientes
     */
    public function loadClients(){
        $clients = User::has('client')->get();
        return view('admin.tablas.client')->with('clients', $clients)->render();             
        
    }

    /**
     * Devuelve todos los empleados
     */
    public function loadEmployees(){
        $employees = User::has('employee')->get();
        return view('admin.tablas.employee')->with('employees', $employees)->render();
    }

    /**
     * Crea y guarda un nuevo cliente
     */
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

    /**
     * Crea y guarda un nuevo empleado
     */
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

    /**
     * Actualiza los datos de un cliente
     */
    public function clientUpdate(Request $request){

        $this->validatorClientUpdate($request->all())->validate();

        $user = User::find($request->id);
        $user->fill($request->all());
        $user->client->fill($request->all());
        $user->push();     
    }

    /**
     * Actualiza los datos de un empleado
     */
    public function employeeUpdate(Request $request){

        $this->validatorEmployeeUpdate($request->all())->validate();

        $user = User::find($request->id);
        $user->fill($request->all());
        $user->employee->fill($request->all());
        $user->push(); 
    }

    /**
     * Elimina todos los datos de un usuario
     */
    public function userDelete($id){
        User::find($id)->delete();
    }

    /**
     * Devuelve una consulta
     * Clientes que cumplan años este mes y que hayan gastado mas de 200€.
     */
    public function birthdayQuery(){
        $query = DB::select('SELECT NAME
        ,
        surname,
        birthday,
        tel,
        email,
        address,
        total
    FROM
        (
        SELECT
            users.name AS NAME,
            users.surname AS surname,
            users.birthday AS birthday,
            users.tel AS tel,
            users.email AS email,
            clients.address AS address,
            SUM(pays.total) AS total
        FROM
            users
        JOIN clients ON users.id = clients.user_id
        JOIN reserves ON reserves.client_id = clients.user_id
        JOIN pays ON pays.id = reserves.pay_id
        GROUP BY
            1,
            2,
            3,
            4,
            5,
            6
        HAVING
            MONTH(users.birthday) = MONTH(NOW()) AND SUM(pays.total) > 200) AS t1'); 

        $view = view('admin.tablas.queryClients')->with('clients', $query)->render();
        return $view;
    }
    
    /**
     * Devuelve una consulta
     * Clientes con reservas pagadas con tarjeta de credito por valor superior a 100€.
     */
    public function creditcardQuery(){
        $query = DB::select('SELECT
        users.name,
        users.surname,
        users.birthday,
        users.tel,
        users.email,
        clients.address,
        pays.total
    FROM
        users
    JOIN clients ON users.id = clients.user_id
    JOIN reserves ON reserves.client_id = clients.user_id
    JOIN pays ON pays.id = reserves.pay_id
    JOIN payways ON payways.id = pays.payway_id
    WHERE
        payways.name LIKE "Visa" AND pays.total > 100 OR payways.name LIKE "MasterCard" AND pays.total > 100');
        
        return view('admin.tablas.queryClients')->with('clients',$query)->render();
    }

    /**
     * Devuelve una consulta
     * Datos del cliente mas mayor que haya realizado alguna reserva.
     */
    public function agedQuery(){
        $query = DB::select('SELECT
        users.name,
        users.surname,
        YEAR(NOW()) - YEAR(users.birthday) AS age,
        users.tel,
        users.email,
        clients.address
    FROM
        users
    JOIN clients ON users.id = clients.user_id
    JOIN reserves ON reserves.client_id = clients.user_id
    WHERE
        users.birthday =(
        SELECT
            MIN(users.birthday)
        FROM
            users
    )');

    return view('admin.tablas.queryAged')->with('clients',$query)->render();
    }
    
    /**
     * Devuelve una consulta
     * Datos de la sala con mayor beneficio
     */
    public function roomQuery(){
        $query = DB::select('SELECT
        IF(
            tipo = 0,
            "Escape Room",
            "Virtual Room"
        ) AS type,
        name,
        description,
        MAX(total) AS total
    FROM
        (
        SELECT
            rooms.type tipo,
            rooms.name NAME,
            rooms.description description,
            SUM(rooms.price) AS total
        FROM
            rooms
        JOIN rentings ON rentings.room_id = rooms.id
        JOIN renting_reserve ON renting_reserve.renting_id = rentings.id
        GROUP BY
            1,
            2,
            3
    ) AS t1
    GROUP BY
        1,
        2,
        3
    LIMIT 1');

    return view('admin.tablas.queryRoom')->with('rooms', $query)->render();
    }


    /**
     * Devuelve una consulta
     * Datos de las reservas del todo el año
     */
    public function reserveQuery(){
        $query = DB::select('SELECT
        IFNULL(
            CONCAT("Reserva ", reserves.id),
            "RESERVAS"
        ) as reserve,
        IFNULL(
            CONCAT("Precio ", rooms.price),
            ""
        ) as price,
        IFNULL(
            CONCAT(
                "Subtotal ",
                invoices.subtotal
            ),
            ""
        ) as subtotal,
        IFNULL(
            CONCAT("IVA ", invoices.iva),
            ""
        ) as iva,
        IFNULL(
            CONCAT("Total ", invoices.total),
            ""
        ) as total,
        IFNULL(
            CONCAT(
                "Totales ",
                SUM(invoices.total)            
            ),
            ""
        ) as totales
    FROM
        invoices
    JOIN reserves ON reserves.id = invoices.reserve_id
    JOIN renting_reserve ON renting_reserve.reserve_id = reserves.id
    JOIN rentings ON rentings.id = renting_reserve.renting_id
    JOIN rooms ON rooms.id = rentings.room_id
    WHERE
        YEAR(reserves.reserve_date) = YEAR(NOW())
    GROUP BY
        1,
        2,
        3,
        4,
        5 WITH ROLLUP');

        return view('admin.tablas.queryReserve')->with('reserves', $query)->render();
    }
}

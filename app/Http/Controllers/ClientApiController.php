<?php

/**
 * @description Controlador API de clientes VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 09.12.2020
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;

class ClientApiController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::has('client')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $user = new User;
            $user->fill($request->all());
            $client = new Client;
            $client->fill($request->all());        
            $user->client()->save($client);
        }); 
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::find($id)->client;
        if ($client){
            return User::with('client')->find($id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.modal.editClient');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($request->id);
        $user->fill($request->all());
        $user->client->fill($request->all());
        $user->push();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $client = $user->client;
        if ($user){
            return $user->delete();
        }        
    }
}

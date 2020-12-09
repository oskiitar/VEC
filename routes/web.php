<?php

/**
 * @description Rutas web VEC
 * @author Oscar Rodriguez Sedes
 * @version 4.0
 * @date 09.12.2020
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 */

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('instalaciones', function () {
    return view('instalaciones');
});

Route::get('tarifas', function () {
    return view('tarifas');
});

Route::get('contacto', function () {
    return view('contacto.contacto');
});

Route::get('politica', function() {
    return view('politica');
});

Route::post('email','MailController@sendMail')->name('email');


/**
 * Grupo de rutas del perfil de usuario
 */
Route::group(['middleware'=>['auth', 'verified'], 'prefix'=>'perfil'], function () {
    Route::get('/', 'ProfileController@showProfile');
    Route::post('actualizar', 'ProfileController@update')->name('profile_update');
    Route::get('user/{id}', 'ProfileController@loadUser');
});

/**
 * Grupo de rutas de reservas de clientes
 */
Route::group(['middleware'=>['auth', 'verified', 'client'], 'prefix'=>'reservas'], function () {
    Route::get('/', 'ReserveController@showReserves');
    Route::get('/{id}', 'ReserveController@loadReserves');
    Route::get('pdf/{id}', 'ReserveController@exportPDF');
});

/**
 * Grupo de rutas de clientes que reservan
 */
Route::group(['middleware' => ['auth', 'verified', 'client'], 'prefix' => 'reservar'], function () {
    Route::get('/', 'ReserveController@show');
    Route::post('horario', 'ReserveController@loadSchedule');
    Route::get('room', 'ReserveController@getRooms');
    Route::get('room/{id}', 'ReserveController@loadRoom');
    Route::get('pagar', 'PayController@show')->name('pago');
    Route::get('metodos', 'PayController@getPayment');
    Route::post('pagar', 'PayController@payReserve');
});

/**
 * Grupo de rutas de la administracion
 */
Route::group(['middleware' => ['auth','admin','verified'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@show')->name('admin');
    Route::get('client', 'AdminController@loadClients');
    Route::get('employee', 'AdminController@loadEmployees');
    Route::post('client', 'AdminController@clientAdd');
    Route::post('employee', 'AdminController@employeeAdd');
    Route::post('client/update', 'AdminController@clientUpdate');
    Route::post('employee/update', 'AdminController@employeeUpdate');
    Route::get('user/{id}','AdminController@userDelete');
    Route::get('query/birthday', 'AdminController@birthdayQuery');
    Route::get('query/creditcard', 'AdminController@creditcardQuery');
    Route::get('query/aged', 'AdminController@agedQuery');
    Route::get('query/room', 'AdminController@roomQuery');
    Route::get('query/reserve', 'AdminController@reserveQuery');
});

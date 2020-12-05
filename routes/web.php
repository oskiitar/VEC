<?php

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

Route::post('email','MailController@sendMail')->name('email');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'reservar'], function () {
    Route::get('/', 'ReserveController@show');
    Route::get('pagar', 'PayController@show')->name('pago');
    Route::post('horario', 'ReserveController@loadSchedule');
    Route::get('room', 'ReserveController@getRooms');
    Route::get('pagar/{id}', 'ReserveController@loadRoom');
});

Route::group(['middleware' => ['auth','admin','verified'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@show');
    Route::get('client', 'AdminController@loadClients');
    Route::get('employee', 'AdminController@loadEmployees');
    Route::post('client', 'AdminController@clientAdd');
    Route::post('employee', 'AdminController@employeeAdd');
    Route::post('client/update', 'AdminController@clientUpdate');
    Route::post('employee/update', 'AdminController@employeeUpdate');
    Route::get('user/{id}','AdminController@userDelete');
});

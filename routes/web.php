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

Route::get('contacto', function () {
    return view('contacto.contacto');
});

Route::post('email','MailController@sendMail')->name('email');

Route::get('reservar', function () {

})->middleware('auth','verified');

Route::get('admin', function () {
    return view('admin.admin');
})->middleware('auth','admin','verified');

Route::group(['middleware' => ['auth','admin','verified'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
});

<?php

/**
 * @description Rutas API VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 09.12.2020
 */

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user', 'ClientApiController');
Route::resource('payway', 'PaywayApiController');
Route::resource('room', 'RoomApiController');

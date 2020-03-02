<?php

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

Route::post('/usuario/login', 'webservices\UsuarioController@login');
Route::get('/usuario/reset/password/{correo}', 'webservices\UsuarioController@resetPassword');
Route::post('/usuario/change/password', 'webservices\UsuarioController@changePassword');

Route::post('/token/update', 'webservices\TokenController@update');
Route::get('/token/delete/{id}', 'webservices\TokenController@delete');

Route::get('/tutor/get/{id}', 'webservices\TutorController@get');
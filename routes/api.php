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

Route::post('auth', function (Request $request) {

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        return '{"auth":"true","devid":'.Auth::user()->device_id.'}';
    }

   return  abort(401);
});


Route::get('devconfig/{id}', 'SmartHomeDataController@index');
Route::get('devconfig/{id}/{image}', 'SmartHomeDataController@downloadImage');
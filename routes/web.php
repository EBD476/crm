<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});


Auth::routes();

Route::group( ['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/homedata', 'SmartHomeDataController');//->name('homedata');
//    Route::post('/homedata/{id}', 'SmartHomeDataController@destroy');
    Route::post('/storelight', 'SmartHomeDataController@storelight')->name('storelight');
    Route::post('/storemodule', 'SmartHomeDataController@storemodule')->name('storemodule');
    Route::resource('/data', 'SmartHomeDataController');
    Route::resource('/users','UserController');

    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::get('setting',function (){
        $user = Auth::user();
        $roles = Spatie\Permission\Models\Role::get();

        return view('admin.setting', compact('user', 'roles'));
    } );
});

//Route::get('devconfig/{id}', 'SmartHomeDataController@index');
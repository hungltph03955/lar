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
    return view('welcome');
});

Route::get('login', ['as'=>'getLogin','uses' => 'LoginController@getLogin']);
Route::post('login', ['as'=>'postLogin','uses' => 'LoginController@postLogin']);
Route::get('logout', ['as'=>'getLogout','uses' => 'LoginController@getLogout']);



Route::get('admin', ['as'=>'admin','middleware' => 'auth',function(){
	return view('admin.dashbroard.main');
}]);


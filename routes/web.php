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

Route::get('qho_login', ['as'=>'getLogin','uses' => 'LoginController@getLogin']);
Route::post('qho_login', ['as'=>'postLogin','uses' => 'LoginController@postLogin']);
Route::get('logout', ['as'=>'getLogout','uses' => 'LoginController@getLogout']);


Route::group(['middleware' => 'auth','namespace' => 'Admin'], function () {
	Route::group(['prefix' => 'qho_admin'],function(){
		Route::get('/',function(){
			return view('admin.module.dashbroard.main');
		});
		Route::group(['prefix' => 'category'],function(){
			Route::get('add',['as'=>'getCatetAdd','uses'=>'CateController@getCatetAdd']);
			Route::post('add',['as'=>'postCatetAdd','uses'=>'CateController@postCatetAdd']);
		});
		Route::group(['prefix' => 'user'],function(){
	
		});
		Route::group(['prefix' => 'news'],function(){
	
		});
	});
});
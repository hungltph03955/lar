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
			Route::get('list',['as'=>'getCateList','uses'=>'CateController@getCateList']);
			Route::get('add',['as'=>'getCateAdd','uses'=>'CateController@getCateAdd']);
			Route::post('add',['as'=>'postCateAdd','uses'=>'CateController@postCateAdd']);
			Route::get('delete/{id}',['as'=>'getCateDel','uses'=>'CateController@getCateDel'])->where('id', '[0-9]+');
			Route::get('edit/{id}',['as'=>'getCateEdit','uses'=>'CateController@getCateEdit'])->where('id', '[0-9]+');;
			Route::post('edit/{id}',['as'=>'postCateEdit','uses'=>'CateController@postCateEdit']);

		});
		Route::group(['prefix' => 'user'],function(){
			Route::get('list',['as'=>'getUserList','uses'=>'UserController@getUserList']);
			Route::get('add',['as'=>'getUserAdd','uses'=>'UserController@getUserAdd']);
			Route::post('add',['as'=>'postUserAdd','uses'=>'UserController@postUserAdd']);
			Route::get('delete/{id}',['as'=>'getUserDel','uses'=>'UserController@getUserDel'])->where('id', '[0-9]+');
			Route::get('edit/{id}',['as'=>'getUserEdit','uses'=>'UserController@getUserEdit'])->where('id', '[0-9]+');;
			Route::post('edit/{id}',['as'=>'postUserEdit','uses'=>'UserController@postUserEdit']);

		});

		Route::group(['prefix' => 'news'],function(){
	
		});
	});
});
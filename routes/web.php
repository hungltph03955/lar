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

Route::group(['prefix' => '/','namespace'=>'User'],function(){
	Route::get('/', ['as'=>'index','uses' => 'MainController@getIndex']);
	Route::get('the-loai/{id}/{slug}', ['as'=>'index','uses' => 'MainController@getCate'])->where('id', '[0-9]+');
	Route::get('chi-tiet-tin/{id}/{alias}', ['as'=>'index','uses' => 'MainController@getDetail'])->where('id', '[0-9]+');
});

Route::get('qho_login', ['as'=>'getLogin','uses' => 'LoginController@getLogin']);
Route::post('qho_login', ['as'=>'postLogin','uses' => 'LoginController@postLogin']);
Route::get('logout', ['as'=>'getLogout','uses' => 'LoginController@getLogout']);


Route::group(['middleware' => 'auth','namespace' => 'Admin'], function () {
	Route::group(['prefix' => 'qho_admin'],function(){
		Route::get('/',function(){
			$stas_user = DB::table('qt64_users')->count();
			$stas_cate = DB::table('qt64_category')->count();
			$stas_news = DB::table('qt64_news')->count();
			return view('admin.module.dashbroard.main',['stas_user'=>$stas_user,'stas_cate'=>$stas_cate,'stas_news'=>$stas_news]);
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
			Route::get('list',['as'=>'getNewsList','uses'=>'NewsController@getNewsList']);
			Route::get('add',['as'=>'getNewsAdd','uses'=>'NewsController@getNewsAdd']);
			Route::post('add',['as'=>'postNewsAdd','uses'=>'NewsController@postNewsAdd']);
			Route::get('delete/{id}',['as'=>'getNewsDel','uses'=>'NewsController@getNewsDel'])->where('id', '[0-9]+');
			Route::get('edit/{id}',['as'=>'getNewsEdit','uses'=>'NewsController@getNewsEdit'])->where('id', '[0-9]+');;
			Route::post('edit/{id}',['as'=>'postNewsEdit','uses'=>'NewsController@postNewsEdit']);
		});
	});
});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('security.login');
});

Route::get('login', 'LoginController@index');
Route::post('postlogin', 'LoginController@postLogin');
Route::get('logout',["as"=>"logout","uses"=>"LoginController@logout"]);

Route::any("user/add",["as"=>"user_add","uses"=>"UserController@create"]);
Route::post('user/store', 'UserController@store');
	
Route::group(array('middleware' => 'auth_check'), function(){
	
	Route::any('user', 'UserController@index');
	Route::any('user/edit/{id}', 'UserController@edit');

	Route::any("blog",["as"=>"blog","uses"=>"BlogController@index"]);
	Route::post("postblog","BlogController@postBlog");
	Route::post("filterblog","BlogController@filterBlog");
});
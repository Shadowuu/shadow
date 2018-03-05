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

// Route::get('/', function () {
//     return view('home/login');
// });


//    加载主页面
    
Route::get('/','homes\AdminController@blog');


//============================前台路由===============================//
Route::group(['namespace'=>'homes'], function () {

	Route::get('/myIndex','AdminController@index');

	Route::post('/micro','microController@store');

	Route::get('/after','AdminController@first');

});

//============================前台未登录===============================//
Route::group(['namespace'=>'homes'], function () {
	
	Route::get('/login','AdminController@login');

	Route::post('/a/dologin','LoginController@a');

	Route::get('/reg','AdminController@reg');

	Route::get('/index','AdminController@first');

	Route::post('/reg/SMS','zhuceController@SMS');

	Route::post('/doReg','regController@doReg');

});


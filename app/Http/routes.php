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

Route::get('/', 'FrontController@index');
Route::get('contato', 'FrontController@contato');
Route::get('reviews', 'FrontController@reviews');
Route::get('admin','FrontController@admin');
Route::resource('usuario', 'UsuarioController');
Route::resource('login', 'LoginController');
Route::get('logout','LoginController@logout');

Route::get('prova', function (){
	return "Hello Word";
});

Route::get('nome/{nome}', function ($nome){
	return "nome é:".$nome;
});

Route::get('idade/{idade}', function ($idade){
	return "idade é:".$idade;
});

Route::get('idade2/{idade?}', function ($idade = 20){
	return "idade é:".$idade;
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('controlador', 'ProvaController@index');

Route::get('nome2/{nome}', 'ProvaController@nome');

Route::get('soma/{num1}/{num2}', 'ProvaController@soma');




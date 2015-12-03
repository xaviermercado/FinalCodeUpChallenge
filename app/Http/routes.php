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

//FXMM.-02-12-2015:we need to create the routes for the whole registrationcontrollers
//1.- First, we add the authentication routes for the application
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//2.- Then We add the Registration Routes

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//3.- finally, we add a PassWordController in order to complete routes.

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
//4.- We add a resource route to Links.


Route::resource('links', 'LinkController');

Route::get('links/{id}/editMax', 'Auth\AuthController@editMax');
Route::post('links/{id}/editMax', 'Auth\AuthController@editMax');
Route::get('links/{id}/delete', 'Auth\AuthController@editMin');
Route::post('links/{id}/editMin', 'Auth\AuthController@editMin');
Route::get('/links/{id}/{idUser}/edit', 'LinkController@edit');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
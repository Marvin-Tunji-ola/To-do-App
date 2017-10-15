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

Route::get('/', 'TaskController@showAll');
Route::get('/completed', 'TaskController@showCompleted');
Route::get('/incomplete', 'TaskController@showIncomplete');
Route::post('/new', 'TaskController@create');
Route::get('/delete/{id}', 'TaskController@delete');
Route::get('/test','TestController@index');
Route::get('/register', 'RegistrationController@index');
Route::get('/login', 'SessionController@index');
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('main');
});


//Route::Resource('/api/tasks','TasksController');
Route::get('/api/todos','TasksController@getAll');
Route::get('/api/todos/{id}','TasksController@get');
Route::post('/api/todos','TasksController@create');
Route::put('/api/todos/{id}','TasksController@edit');
Route::delete('/api/todos/{id}','TasksController@destroy');



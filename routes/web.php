<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    //
	Route::get('/', ['uses' => 'AdminController@index']);
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user']], function() {
    //
	Route::get('/', ['uses' => 'UserController@index']);
});

Route::resource('distribution', 'DistributionController');

Route::resource('taxonomic', 'TaxonomicClassController');

Auth::routes();

// Route::get('/home', 'HomeController@index');

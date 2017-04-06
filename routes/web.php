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
	if(\Auth::guest()){
		return view('auth.login');		
	}else{		
		return redirect('dashboard');
	}
});



Route::group(['middleware' => 'auth'], function() {
    //
	Route::get('/dashboard', ['uses' => 'MainController@getIndex']);
});


Route::resource('distribution', 'DistributionController');

Route::resource('taxonomic', 'TaxonomicClassController');

Auth::routes();

// Route::get('/home', 'HomeController@index');

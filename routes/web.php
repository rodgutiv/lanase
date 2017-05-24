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



Route::get('/', [
		'uses'	=> 'SiteController@index',
		'as'	=> 'site.index'
		]);

Route::get('/investigadores', function() {
    //
    return view('site.investigadores');
})->name('investigadores');


Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function() {
    //
	Route::get('/dashboard', [
		'uses' => 'MainController@getIndex',
		'as' => 'dashboard']);
	Route::post('users/getUsers', [
		'uses'	=> 'UserController@getUsers',
		'as'	=> 'users.getUsers'
		]);
	Route::resource('users', 'UserController');
	Route::resource('researcharea', 'ResearchAreaController');
	Route::resource('projects', 'ProjectsController');
});


Route::resource('distribution', 'DistributionController');

Route::resource('taxonomic', 'TaxonomicClassController');

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', 'HomeController@index');

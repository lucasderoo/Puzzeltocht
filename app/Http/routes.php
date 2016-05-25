<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTPassignments
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
	Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
	Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);
	Route::get('/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
	Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    Route::get('home', 'HomeController@index');

    Route::resource('/home/opdrachten', 'AssignmentsController');
    Route::post('/home/opdrachten/store/{tripid}/{prevurl}', 'AssignmentsController@store');
    Route::get('/home/opdrachten/create/{user}', 'AssignmentsController@create');
    Route::get('/home/opdrachten/delete/{id}/{tripid}', 'AssignmentsController@delete');
    Route::post('/home/opdrachten/destroy/{id}/{tripid}/{prevurl}', 'AssignmentsController@destroy');
    Route::get('/home/opdrachten/edit/{id}/{tripid}', 'AssignmentsController@edit');
    Route::get('/home/opdrachten/update/{id}/{tripid}/{prevurl}', 'AssignmentsController@update');
    Route::get('/home/opdrachten/show/{id}/{tripid}', 'AssignmentsController@show');
    Route::get('/home/opdrachten/active/{id}/{tripid}', 'AssignmentsController@active');
    Route::get('/home/opdrachten/connect/{tripid}', 'AssignmentsController@connect');
    Route::post('/home/opdrachten/connectassignments/{tripid}/{prevurl}', 'AssignmentsController@connectassignments');

    Route::resource('/home/tochten/wait', 'TripsController@wait');
    Route::resource('/home/tochten', 'TripsController');
    Route::get('/home/tochten/delete/{tripid}', 'TripsController@delete');
    Route::post('/home/tochten/destroy/{tripid}', 'TripsController@destroy');
    Route::get('/home/tochten/create/{user}', 'TripsController@create');
    Route::post('/home/tochten/store/{tripid}', 'TripsController@store');
    Route::get('/home/tochten/show/{tripid}', 'TripsController@show');
    Route::get('/home/tochten/edit/{tripid}', 'TripsController@edit');

    Route::get('/home/starttrip', 'StarttripController@index');
    Route::post('/home/starttrip/start/result/{tripid}', 'StarttripController@tripresult');
    Route::get('/home/starttrip/start/{tripid}', 'StarttripController@starttrip');
    Route::get('/home/starttrip/teamoverview/{tripid}', 'StarttripController@teamoverview');
    Route::get('/home/starttrip/createteams/{tripid}', 'StarttripController@createteams');
    Route::post('/home/starttrip/storeteams/{tripid}', 'StarttripController@storeteams');


});



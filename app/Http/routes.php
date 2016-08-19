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

Route::get('/signin', function()
{
	return View::make('login')->with('status', '');
});

Route::post('/signin', 'UserController@signin');

Route::group(array('middleware'=>'alreadyOnline'), function() {
	Route::get('/', function() { return View::make('index'); });

	Route::get('/iregister', function() {
		return View::make('iregister');
	});

	Route::get('/register', function() {
		return View::make('register')->with('registrationStatus', ' ');
	});

	Route::post('/register', 'UserController@register');
	
	Route::get('/tregister', function() {
		return View::make('tregister')->with('registrationStatus', ' ');
	});

	Route::post('/tregister', 'UserController@tregister');	
});

Route::group(array('middleware'=>'auth'), function() {
	Route::get('/dashboard', 'UserController@getDashboard');
	Route::get('/displayEvents', 'EventController@display');
	Route::get('/createEvent', 'EventController@createForm');
	Route::get('/deleteEvent/{id}', 'EventController@deleteEvent');
	Route::get('/showEvent/{id}', 'EventController@showEvent');
	Route::get('/purchaseEvent/{id}', 'EventController@purchaseEvent');
	Route::get('/logout', function()
	{
		Session::flush();
		Auth::logout();
		return Redirect::to('/');
	});
		

	Route::post('/createEvent', 'EventController@createEvent');
	Route::post('/deleteAccount', 'UserController@deleteAccount');

	Route::get('/search_event', function() {
		return View::make('browse-event')->with('notFound', "null");
	});
	
	Route::post('/returnEvents', array('uses' => 'EventController@returnEvents'));
	Route::get('/pdf_generate/{id}', 'TicketController@getPDF');
});
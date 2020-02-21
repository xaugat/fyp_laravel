<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// These are the api routes for the users table

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        // Route::post('user', 'UserController@user');
        Route::get('users', 'AuthController@users'); 
        

        Route::get('user/{id}', 'AuthController@getUserById');   
        
        
    });
});

// this is the api routes for events table:

Route::get('events', 'EventController@index');

Route::get('event/{id}', 'EventController@show');

Route::post('event', 'EventController@store');

Route::put('event', 'EventController@store');

Route::delete('event/{id}', 'EventController@destroy');
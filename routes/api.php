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
    Route::post('login', 'AuthController@login'); // api route for login user
    Route::post('signup', 'AuthController@signup'); // api route for register
    Route::post('Api/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail'); // api route for forgot passsword
    Route::post('Api/password/reset', 'Api\ResetPasswordController@reset');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout'); // api route for logout user
        Route::get('user', 'AuthController@user'); // api route for display logged in user

        Route::get('users', 'AuthController@users'); // api route for displaying all user
        Route::get('user/{id}', 'AuthController@getUserById'); // api route for displaying 1 user by id

        Route::put('userupdate/{id}', 'AuthController@updatebyid'); // api route for update user data


    });
});

// this is the api routes for events table:

Route::get('events', 'EventController@index'); // api route for showing events

Route::get('allevents', 'EventController@allevents');

Route::get('search', 'EventController@search'); // api route for searching events

Route::get('event/{id}', 'EventController@show'); // api route for showing events by id

Route::post('event', 'EventController@store'); // api route for create event

Route::put('event', 'EventController@store'); // api route for update events

Route::delete('event/{id}', 'EventController@destroy'); // api route for delete events

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

Route::get('/', function () { // routes for navigation in system welcome page
    return view('welcome');
});

Auth::routes(); //checks authentication first and only redirects user in website

Route::get('/home', 'HomeController@index')->name('home'); // routes for navigation in admin home page

Route::get('/users', 'AuthController@users')->name('Users'); // api routes to show list of users

Route::get('/user', 'AuthController@user')->name('User');

Route::get('/userslist', 'HomeController@userslist')->name('Users'); // routes for navigation in admin userslist page


Route::get('/eventlist', 'HomeController@eventlist')->name('Events'); // routes for navigation in admin eventlist page





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

Route::get('/', function () {
    return view('welcome');
});

// login authentication
Auth::routes();

// both logged in and logged out dynamically
Route::get('/home', 'HomeController@index')->name('home');

// facebook deauthorization call back process to in active user
Route::post('/delete', 'SocialAuthController@delete')->name('delete');

// facebook redirecct after login
Route::get('/redirect', 'SocialAuthController@redirect');

// facebook callback after login
Route::get('/callback', 'SocialAuthController@callback');
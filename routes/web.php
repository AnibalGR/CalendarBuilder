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
    return view('welcome2');
});

Route::get('/plans', 'PlansController@index')->name('plans');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/plan/{plan}', 'PlansController@show');
    Route::get('/braintree/token', 'BraintreeTokenController@token');
    Route::post('/subscribe', 'SubscriptionsController@store');
    Route::get('/dashboard', 'HomeController@dashboard');
});

// Ruta para desarrollar pruebas
Route::get('/pruebas', 'HomeController@showHomePage')->name('pruebas');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

// Ruta para probar la subscripcion
Route::get('/subscribe', 'Subscribe\SubscribeController@showPaymentForm');
Route::post('/subscribe', 'Subscribe\SubscribeController@index');


// Ruta para desarrollar pruebas
Route::get('/pruebas', 'HomeController@showHomePage')->name('pruebas');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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



// Ruta para probar la subscripcion
Route::get('/subscribe', 'Subscribe\SubscribeController@showPaymentForm')->name('subscribe');
Route::post('/subscribe', 'Subscribe\SubscribeController@orderPost')->name('order-post');


// Ruta para desarrollar pruebas
Route::get('/pruebas', 'HomeController@showHomePage')->name('pruebas');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@getWelcome2');
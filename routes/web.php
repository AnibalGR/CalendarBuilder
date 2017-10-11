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

// Home page
Route::get('/', function () {
    return view('welcome2');
});

// A non-registered user can see the plans
Route::get('/plans', 'PlansController@index')->name('plans');

// Private routes to show only to subscribed members
Route::group(['middleware' => 'auth'], function () {
    
    //This is the route to subscribe to a plan
    Route::get('/plan/{plan}', 'PlansController@show');
    
    // Internal route to generate a token for the user credit card
    Route::get('/braintree/token', 'BraintreeTokenController@token');
    
    // The registration for a subscription route
    Route::post('/subscribe', 'SubscriptionsController@store');
    
    // The main user interface (Dashboard)
    Route::get('/dashboard', 'HomeController@dashboard')->name('dash');
    
    // Route to the delete calendar
    Route::delete('/delete_calendar/{id}', 'HomeController@deleteCalendar')->name('deleteCalendar');
    
    // Route to the save calendar
    Route::post('/save_calendar/{id}', 'HomeController@saveCalendar')->name('saveCalendar');
    
    // Route to upload the image files
    Route::post('/upload', 'HomeController@uploadImage')->name('uploadImage');
    
    // Route to upload the video files
    Route::post('/uploadV', 'HomeController@uploadVideo')->name('uploadVideo');
});

// Routes for the user´s autentication
Auth::routes();

// This is the calendar builder URL
Route::post('/home', 'HomeController@index')->name('home');

// This is the calendar builder URL
Route::get('/home', function(){
    return redirect('/dashboard');
});

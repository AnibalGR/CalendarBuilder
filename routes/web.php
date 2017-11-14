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
})->name('start');

// A non-registered user can see the plans
Route::get('/plans', 'PlansController@index')->name('plans');

// A non-registered user can see the plans
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Private routes to show only to subscribed members
Route::group(['middleware' => 'auth'], function () {
    
    //This is the route to subscribe to a plan
    Route::get('/plan/{plan}', 'PlansController@show');
    
    // Internal route to generate a token for the user credit card
    Route::get('/braintree/token', 'BraintreeTokenController@token');
    
    // The registration for a subscription route
    Route::post('/subscribe', 'SubscriptionsController@store');
    
    // The update of the payment method
    Route::post('/update_card', 'SubscriptionsController@updateCard');
    
    // The main user interface (Dashboard)
    Route::get('/dashboard', 'HomeController@showDashboard')->name('dash');
    
    // Route to the delete calendar
    Route::delete('/delete_calendar/{id}', 'CalendarController@deleteCalendar')->name('deleteCalendar');
    
    // Route to the delete generated video
    Route::post('/delete_generated_video', 'HomeController@deleteGeneratedVideo')->name('deleteGeneratedVideo');
    
    // Route to the save calendar
    Route::post('/save_calendar', 'CalendarController@saveCalendar')->name('saveCalendar');
    
    // Route to generate video
    Route::post('/generateV', 'HomeController@generateVideo')->name('generateVideo');
    
    // Route to store the calendar image
    Route::post('/saveImage', 'HomeController@saveImage')->name('saveImage');
    
    // Route to delete video from calendar
    Route::post('/delVideo', 'VideoController@removeVideo')->name('delVideo');
    
    // Route to upload the image files
    Route::post('/upload', 'HomeController@uploadImage')->name('uploadImage');
    
    // Route to upload the video files
    Route::post('/uploadV', 'HomeController@uploadVideo')->name('uploadVideo');
    
    // Route to edit the calendars
    Route::get('/edit_calendar/{id}', 'CalendarController@editCalendar')->name('editCalendar');
    
    // Route to manage subscriptions
    Route::get('/subscriptions', 'SubscriptionsController@index');
    
    // Route to cancel subscriptions
    Route::post('/subscription/cancel', 'SubscriptionsController@cancel');
    
    // Route to resume subscriptions
    Route::post('/subscription/resume', 'SubscriptionsController@resume');
    
    // Route to store video in database
    Route::post('/storeVideo', 'VideoController@store')->name('storeVideo');
    
});

// Routes for the user´s autentication
Auth::routes();

// This is the calendar builder URL
Route::post('/calendar-builder', 'CalendarController@showCalendarBuilder')->name('calendarBuilder');

// This is the calendar builder URL
Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::get('/how-it-works', function(){
    return view('how-it-works');
})->name('how-it-works');
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
Route::get('/', 'HomeController@home');

Auth::routes();

Route::middleware(['auth','isVerified'])->prefix('dashboard')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/cemeras','HomeController@cameras')->name('cameras');

    Route::get('/details', 'HomeController@details')->name('details');

    Route::get('/images','HomeController@images')->name('images');

    Route::resource('/settings', 'SettingsController');
    //Route::get('/settings','HomeController@settings')->name('settings');
    
    Route::get('/account','HomeController@account')->name('account');


});


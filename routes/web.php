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
Route::get('/getarea', 'SettingsController@getarea');
Route::post('/deleteitem/{id}', 'SettingsController@deleteitem');

Route::middleware(['auth','isVerified'])->prefix('dashboard')->group(function () {
Route::post('/store/area','SettingsController@store_area');
    
    Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('/cemeras','HomeController@cameras')->name('cameras');

    Route::get('/details', 'HomeController@details')->name('details');

    Route::get('/images','HomeController@images')->name('images');

    Route::resource('/settings', 'SettingsController');
    //Route::get('/settings','HomeController@settings')->name('settings');

    Route::resource('/cameras', 'CamerasController');

    Route::resource('/account','AccountController');

    Route::get('/change_area','HomeController@change_area')->name('change_area');

});


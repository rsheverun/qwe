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
Route::post('/store/area','SettingsController@store_area');
Route::get('/show_all/{id}', 'CamerasController@show_all');
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/images','ImagesController@index')->name('images');

    Route::resource('/settings', 'SettingsController');

    Route::resource('/cameras', 'CamerasController');

    Route::resource('/account','AccountController');

    Route::get('/change_area','HomeController@change_area')->name('change_area');


});


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
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('/settings', 'SettingsController');
    });

    Route::group(['middleware' => ['role:admin|user']], function () {
        Route::get('/show_all/{id}', 'CamerasController@show_all');
                
        Route::post('/addcomment/{id}','ImagesController@add_comment')->name('add_comment');

        Route::get('/image/{id}/comments','ImagesController@get_comments')->name('get_comments');
        
        Route::resource('/images','ImagesController');
    });
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/images','ImagesController')->except(['destroy']);

    Route::resource('/cameras', 'CamerasController')->only(['index']);

    Route::resource('/account','AccountController');

    Route::get('/change_area','HomeController@change_area')->name('change_area');


});


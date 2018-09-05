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
Route::get('/data-chart', 'HomeController@chartData')->name('chart-data');
Route::get('/data-pie-chart','HomeController@chartPieData');
Route::view('/', 'auth.login');
Route::get('/locale','HomeController@change_locale')->name('change_locale');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home_text', 'HomeController@text')->name('text');



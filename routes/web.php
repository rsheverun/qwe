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
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => ['role:active']], function () {
   
    

});


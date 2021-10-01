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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('patient/create', 'Admin\PatientController@add');
    Route::post('patient/create', 'Admin\PatientController@create');
    Route::get('patient', 'Admin\PatientController@index')->middleware('auth'); 
    Route::get('patient/edit', 'Admin\PatientController@edit')->middleware('auth'); 
    Route::post('patient/edit', 'Admin\PatientController@update')->middleware('auth'); 
    Route::get('patient/delete', 'Admin\PatientController@delete')->middleware('auth');
    
    Route::get('karte/create', 'Admin\KarteController@add')->middleware('auth');
    Route::post('karte/create', 'Admin\KarteController@create')->middleware('auth');
    Route::get('karte', 'Admin\KarteController@index')->middleware('auth'); 
    Route::get('karte/edit', 'Admin\KarteController@edit')->middleware('auth'); 
    Route::post('karte/edit', 'Admin\KarteController@update')->middleware('auth'); 
    Route::get('karte/delete', 'Admin\KarteController@delete')->middleware('auth');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');



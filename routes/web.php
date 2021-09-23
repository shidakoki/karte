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
    Route::get('karte/create', 'Admin\KarteController@add')->middleware('auth');
    Route::get('karte/create', 'Admin\KarteController@edit')->middleware('auth');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');



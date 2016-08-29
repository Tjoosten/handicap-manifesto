<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::auth();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/disclaimer', 'DisclaimerController@index')->name('disclaimer');

Route::post('/signature', 'SignatureController@insert')->name('signature.insert');
Route::get('/signature/pdf', 'SignatureController@pdf')->name('signature.pdf');

// Signature backend controllers
Route::get('/signature/backend', 'SignatureController@index')->name('signature.backend');

Route::get('/users', 'LoginController@index')->name('users');
Route::get('/users/destroy/{id}', 'LoginController@destroy')->name('users.destroy');

Route::get('/report', 'ErrorController@register')->name('report');
Route::post('/report', 'ErrorController@store')->name('report.store');

Route::get('/backend', 'BackendController@index')->name('backend');

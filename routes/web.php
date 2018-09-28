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
    return view('Panel/index');
})
    ->name('index');
Route::post('email-send', 'EmailController@send')
    ->name('email-send');
Route::get('email-history', 'EmailController@getEmailHistory')
    ->name('email-history');
Route::get('from-history/{id}','EmailController@getEmailFromHistory')
    ->name('email-send-from-history');
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/pay/{step?}', 'PayController@create')->name('pay_create');
Route::post('/pay/{step}', 'PayController@store')->name('pay_store');

Route::get('/transaction/{reference}', 'PayController@show')->name('transaction_show');

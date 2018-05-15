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

Route::get('/', 'PayController@home');
Route::get('/create', 'PayController@formPayment');
Route::post('/create', 'PayController@createPayment');
Route::post('/update', 'PayController@endPayment');
Route::get('/update', 'PayController@endPayment');

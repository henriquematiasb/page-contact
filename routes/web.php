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

Route::prefix('contact')->group(function () {
    Route::get('create', 'ContactController@create')->name('contact.create');
    Route::post('store', 'ContactController@store')->name('contact.store');
});

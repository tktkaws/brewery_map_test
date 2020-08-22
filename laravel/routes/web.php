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

Auth::routes(); //-- この行を追加
Route::get('/', 'BreweryController@index')->name('breweries.index');
Route::resource('/breweries', 'BreweryController')->except(['index', 'show'])->middleware('auth'); //-- この行を変更
Route::resource('/breweries', 'BreweryController')->only(['show']); //-- この行を追加
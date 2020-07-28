<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('tools.')->group(function () {
    Route::get('tools', 'ToolController@index')->name('index');
    Route::post('tools', 'ToolController@store')->name('store');
});

Route::name('tradesmen.')->group(function () {
    Route::get('tradesmen', 'TradesmanController@index')->name('index');
    Route::post('tradesmen', 'TradesmanController@store')->name('store');
});

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

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'colors'], function () {
        Route::get('/', 'ColorController@index')->name('dashboard.colors.index');
    });
});

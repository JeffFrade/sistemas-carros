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
    return redirect(route('login'));
});

Auth::routes([
    'register' => false
]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'colors'], function () {
        Route::get('/', 'ColorController@index')->name('dashboard.colors.index');
        Route::get('/create', 'ColorController@create')->name('dashboard.colors.create');
        Route::post('/store', 'ColorController@store')->name('dashboard.colors.store');
        Route::get('/edit/{id}', 'ColorController@edit')->name('dashboard.colors.edit');
        Route::put('/update/{id}', 'ColorController@update')->name('dashboard.colors.update');
        Route::delete('/delete/{id}', 'ColorController@delete')->name('dashboard.colors.delete');
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', 'BrandController@index')->name('dashboard.brands.index');
        Route::get('/create', 'BrandController@create')->name('dashboard.brands.create');
        Route::post('/store', 'BrandController@store')->name('dashboard.brands.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('dashboard.brands.edit');
        Route::put('/update/{id}', 'BrandController@update')->name('dashboard.brands.update');
        Route::delete('/delete/{id}', 'BrandController@delete')->name('dashboard.brands.delete');
    });

    Route::group(['prefix' => 'cars'], function () {
        Route::get('/', 'CarController@index')->name('dashboard.cars.index');
        Route::get('/create', 'CarController@create')->name('dashboard.cars.create');
        Route::post('/store', 'CarController@store')->name('dashboard.cars.store');
        Route::get('/edit/{id}', 'CarController@edit')->name('dashboard.cars.edit');
        Route::put('/update/{id}', 'CarController@update')->name('dashboard.cars.update');
        Route::delete('/delete/{id}', 'CarController@delete')->name('dashboard.cars.delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('dashboard.users.index');
        Route::get('/create', 'UserController@create')->name('dashboard.users.create');
        Route::post('/store', 'UserController@store')->name('dashboard.users.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('dashboard.users.edit');
        Route::put('/update/{id}', 'UserController@update')->name('dashboard.users.update');
        Route::delete('/delete/{id}', 'UserController@delete')->name('dashboard.users.delete');
    });
});

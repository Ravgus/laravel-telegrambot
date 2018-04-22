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

Auth::routes();

Route::match(['post', 'get'], 'register', function (){
    Auth::logout();
    return redirect('/');
})->name('register');

Route::middleware(['auth'])->prefix('admin')->namespace('Backend')->name('admin.')->group(function (){
    Route::get('/', 'DashboardController@index')->name('index');

    Route::get('/setting', 'SettingController@index')->name('setting.index');
    Route::post('/setting/store', 'SettingController@store')->name('setting.store');
});

Route::get('/home', 'HomeController@index')->name('home');

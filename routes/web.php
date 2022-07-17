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

Route::post('auth', 'Auth\LoginController@validateLogin')->name("login.auth");

Route::get('/register','Auth\RegisterController@showRegistrationForm')->name("register.view");
Route::post('/register/submit', 'Auth\RegisterController@validateRegister')->name("register.auth");




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/password', 'StockController@changePasswordView')->name('password.change.view');
Route::post('/password/change', 'StockController@changePassword')->name('password.change');

Route::prefix('stocks')->group(function (){
    Route::name('stocks.')->group(function (){
        Route::get('index', 'StockController@index')->name('show');
        Route::get('show/add/Stock', 'StockController@showAddStock')->name('show.add.stock');
        Route::post('add', 'StockController@addStock')->name('add');
        Route::delete('delete/{id}', 'StockController@destroy')->name('destroy');

        Route::get('show/update/stock/{id}', 'StockController@showUpdateStock')->name('show.update.stock');
        Route::post('update/stock/{id}', 'StockController@updateStock')->name('update.stock');
    });
});
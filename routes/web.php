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

Route::get('/password', 'FileController@changePasswordView')->name('password.change.view');
Route::post('/password/change', 'FileController@changePassword')->name('password.change');


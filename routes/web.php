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

Route::get('/', 'App\Http\Controllers\MainController@home')->name('home');
Route::get('/edit', 'App\Http\Controllers\MainController@edit');

Route::post('/edit/check', 'App\Http\Controllers\MainController@edit_check');
Route::post('/edit/{id}/check', 'App\Http\Controllers\MainController@change_check');
Route::get('/delete/{id}', 'App\Http\Controllers\MainController@delete');

Route::get('/edit/{id}', 'App\Http\Controllers\MainController@change');

Route::get('/create', 'App\Http\Controllers\MainController@create');

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login/check', 'App\Http\Controllers\AuthController@login_check');

Route::get('/registration', 'App\Http\Controllers\AuthController@registration');
Route::post('/registration/check', 'App\Http\Controllers\AuthController@registration_check');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

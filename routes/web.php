<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});
Route::resource('users', 'App\Http\Controllers\UserController');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/admin/login', 'App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login');
Route::middleware(['admin'])->group(function(){
//    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/dashboard/users', 'App\Http\Controllers\Admin\AdminController@index');
    Route::get('/admin/dashboard/users/create', 'App\Http\Controllers\Admin\AdminController@create');
    Route::post('/admin/dashboard/users', 'App\Http\Controllers\Admin\AdminController@store');
    Route::get('/admin/dashboard/users/{id}/edit', 'App\Http\Controllers\Admin\AdminController@edit');
    Route::patch('/admin/dashboard/users/{id}', 'App\Http\Controllers\Admin\AdminController@update');
    Route::delete('/admin/dashboard/users/{id}', 'App\Http\Controllers\Admin\AdminController@destroy');
    Route::post('/admin/logout', 'App\Http\Controllers\Admin\Auth\LoginController@logout')->name('admin.logout');
});


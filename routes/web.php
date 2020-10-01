<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
//Route::resource('users','UserController');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/main', 'App\Http\Controllers\MainController@index');
//Route::post('/main/checklogin', 'App\Http\Controllers\MainController@checklogin');
//Route::get('main/successlogin', 'App\Http\Controllers\MainController@successlogin');
//Route::get('main/logout', 'App\Http\Controllers\MainController@logout');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/admin/login', 'App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login');
Route::middleware(['admin'])->group(function(){
    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::post('/admin/logout', 'App\Http\Controllers\Admin\Auth\LoginController@logout')->name('admin.logout');
});


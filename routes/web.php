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
Route::resource('messages', 'App\Http\Controllers\MessageController');
//Route::get('/messages', 'App\Http\Controllers\MessageController@index');
Route::post('/messages/{id}', 'App\Http\Controllers\MessageController@store');

Route::get('/uploads', 'App\Http\Controllers\SubmissionController@index');
Route::get('/uploads/{id}', 'App\Http\Controllers\SubmissionController@create');
Route::post('/uploads/{id}', 'App\Http\Controllers\SubmissionController@store');
Route::get('/download/{path}', 'App\Http\Controllers\SubmissionController@download');

Route::get('/challenges', 'App\Http\Controllers\ChallengeController@index');
Route::get('/challenges/submit/{id}', 'App\Http\Controllers\ChallengeController@show');
Route::post('/challenges/submit/{id}', 'App\Http\Controllers\ChallengeController@submit');
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

    Route::get('/admin/dashboard/messages', 'App\Http\Controllers\Admin\MessageController@index');
    Route::post('/admin/dashboard/messages/{id}', 'App\Http\Controllers\Admin\MessageController@store');
    Route::get('/admin/dashboard/messages/{id}/edit', 'App\Http\Controllers\Admin\MessageController@edit');
    Route::patch('/admin/dashboard/messages/{id}', 'App\Http\Controllers\Admin\MessageController@update');
    Route::delete('/admin/dashboard/messages/{id}', 'App\Http\Controllers\Admin\MessageController@destroy');

    Route::get('/admin/dashboard/uploads', 'App\Http\Controllers\Admin\HomeworkController@index');
    Route::post('/admin/dashboard/uploads', 'App\Http\Controllers\Admin\HomeworkController@store');
    Route::get('/admin/dashboard/download/{path}', 'App\Http\Controllers\Admin\HomeworkController@download');
    Route::get('/admin/dashboard/submissions/{id}', 'App\Http\Controllers\Admin\HomeworkController@viewSubmissions');
    Route::get('/admin/dashboard/submissions/download/{path}', 'App\Http\Controllers\Admin\HomeworkController@downloadSub');

    Route::get('/admin/dashboard/challenges', 'App\Http\Controllers\Admin\ChallengeController@index');
    Route::post('/admin/dashboard/challenges', 'App\Http\Controllers\Admin\ChallengeController@store');

    Route::post('/admin/logout', 'App\Http\Controllers\Admin\Auth\LoginController@logout')->name('admin.logout');
});


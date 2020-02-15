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

use App\Mail\ReportMail;
use Illuminate\Support\Facades\Mail;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'Posts');

Route::get('/', 'Posts@index')->name('posts.index');
Route::get('/search', 'Posts@search');

//Route::get('posts.create', 'Posts@create');

//Route::get('email', 'ContactController@sendEmail');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});

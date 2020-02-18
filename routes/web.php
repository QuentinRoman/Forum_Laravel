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


use Illuminate\Support\Facades\Mail;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'Posts');
Route::redirect('/', '/posts');

Route::resource('category', 'Categories');

Route::get('/search', 'Posts@search');

Route::get('ReportMail', function () {
    $invoice = \Laravelista\Comments\Comment::find(1);

    return (new App\Notifications\ReportComment($invoice))
        ->toMail($invoice->user);
});

Route::get('email', 'ContactController@sendEmail');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});

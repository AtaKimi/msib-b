<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(GuestController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/post', 'post')->name('sample-post');
    Route::get('/post/{blog}', 'postDetail')->name('post-detail');
    Route::get('/ckeditor', 'ckeditor')->name('ckeditor');
});

Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');    });
    ROute::controller(BlogController::class)->group(function () {
        Route::get('/blogs', 'index')->name('admin-blog-index');
        Route::get('/blogs/search', 'search')->name('admin-blog-search');
        Route::get('/blogs/create', 'create')->name('admin-blog-create');
        Route::post('/blogs', 'store')->name('admin-blog-store');
        Route::get('/blogs/{blog}/edit', 'edit')->name('admin-blog-edit');
        Route::put('/blogs/{blog}', 'update')->name('admin-blog-update');
        Route::delete('/blogs/{blog}/destroy', 'destroy')->name('admin-blog-destroy');
        Route::post('/blogs/upload-img', 'uploadImg')->name('admin-blog-upload-img');
    });
});



Auth::routes();

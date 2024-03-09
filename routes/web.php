<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');

    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');

});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/posts', 'IndexController')->name('admin.post.index');
        Route::get('/posts/create', 'CreateController')->name('admin.post.create');

        Route::post('/posts', 'StoreController')->name('admin.post.store');
        Route::get('/posts/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.delete');
    });
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');


Route::get('/about', [AboutController::class, 'index'])->name('about.index');


Route::get('/users', [UserController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\WebsiteController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
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

Route::get('/', [HomeController::class, 'home'])->name('frontend.home-page');
Route::post('/subscriber', [HomeController::class, 'subscriber'])->name('frontend.subscriber');
Route::get('/search-post/{query}', [HomeController::class, 'search'])->name('frontend.search-post');
Route::get('post/{post}', [FrontendPostController::class, 'singlePost'])->name('frontend.single-post');
Route::post('/comment/{post}', [FrontendPostController::class, 'comment'])->name('frontend.comment');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/post', PostController::class);
    Route::get('/status/{post}', [PostController::class, 'changeStatus'])->name('post.status');
    Route::resource('/website', WebsiteController::class);
    Route::resource('/profile', ProfileController::class);
});
require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfilesController;

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
Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/category/{id}', [\App\Http\Controllers\HomeController::class, 'categoryPosts']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    // Categories
    Route::resource('/categories', CategoriesController::class);
    // Posts
    Route::resource('/posts', PostsController::class);
    // Profiles
    Route::get('/profiles/{profile}', [ProfilesController::class, 'show'])->name('profiles.show');
    Route::get('/profiles/{profile}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
    Route::post('/profiles/{profile}', [ProfilesController::class, 'update'])->name('profiles.update');
    // Comments
    Route::get('/comments', [CommentsController::class, 'index'])->name('comments.index');
    Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
});
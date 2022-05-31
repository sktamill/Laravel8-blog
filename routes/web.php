<?php

use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Admin\Main\PostController;
use App\Http\Controllers\Admin\Main\TagController;
use App\Http\Controllers\Admin\Main\UserController;
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

Route::group(['namespace' => 'Main'], function (){
   Route::get('/', [\App\Http\Controllers\Main\IndexController::class, 'index'])->name('name.index');
   Route::get('/categories', [\App\Http\Controllers\Main\IndexController::class, 'categories'])->name('name.categories');
   Route::get('/post/{post}', [\App\Http\Controllers\Main\IndexController::class, 'post'])->name('name.post');
   Route::post('/post/{post}', [\App\Http\Controllers\Main\IndexController::class, 'postStore'])->name('name.post.store');
   Route::post('/post/favorites/{post}', [\App\Http\Controllers\Main\IndexController::class, 'postFavoritesStore'])->name('name.post-fav.store');
});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'personal']], function (){
   Route::get('/', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personal'])->name('personal.index');
   Route::get('/favorites', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personalFavorites'])->name('personal.favorites');
   Route::delete('/favorites/{post}', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personalDestroy'])->name('personal.destroy');

   Route::get('/comment', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personalComment'])->name('personal.comment');
   Route::get('/comment/{comment}/edit', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personalCommentEdit'])->name('personal.comment.edit');
   Route::patch('/comment/{comment}', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personalCommentUpdate'])->name('personal.comment.update');
   Route::delete('/comment/{comment}', [\App\Http\Controllers\Personal\Main\IndexController::class, 'personalCommentDestroy'])->name('personal.comment.destroy');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
     Route::get('/', [IndexController::class, 'index'])->name('main.index');

     Route::get('/category', [IndexController::class, 'category'])->name('category.index');
     Route::get('/category/create', [IndexController::class, 'categoryCreate'])->name('category.create');
     Route::post('/category', [IndexController::class, 'categoryStore'])->name('category.store');
     Route::get('/category/{category}', [IndexController::class, 'categoryShow'])->name('category.show');
     Route::get('/category/{category}/edit', [IndexController::class, 'categoryEdit'])->name('category.edit');
     Route::patch('/category/{category}', [IndexController::class, 'categoryUpdate'])->name('category.update');
     Route::delete('/category/{category}', [IndexController::class, 'categoryDestroy'])->name('category.destroy');

     Route::get('/tag', [TagController::class, 'tag'])->name('tag.index');
     Route::get('/tag/create', [TagController::class, 'tagCreate'])->name('tag.create');
     Route::post('/tag', [TagController::class, 'tagStore'])->name('tag.store');
     Route::get('/tag/{tag}', [TagController::class, 'tagShow'])->name('tag.show');
     Route::get('/tag/{tag}/edit', [TagController::class, 'tagEdit'])->name('tag.edit');
     Route::patch('/tag/{tag}', [TagController::class, 'tagUpdate'])->name('tag.update');
     Route::delete('/tag/{tag}', [TagController::class, 'tagDestroy'])->name('tag.destroy');

     Route::get('/post', [PostController::class, 'post'])->name('post.index');
     Route::get('/post/create', [PostController::class, 'postCreate'])->name('post.create');
     Route::post('/post', [PostController::class, 'postStore'])->name('post.store');
     Route::get('/post/{post}', [PostController::class, 'postShow'])->name('post.show');
     Route::get('/post/{post}/edit', [PostController::class, 'postEdit'])->name('post.edit');
     Route::patch('/post/{post}', [PostController::class, 'postUpdate'])->name('post.update');
     Route::delete('/post/{post}', [PostController::class, 'postDestroy'])->name('post.destroy');

     Route::get('/user', [UserController::class, 'user'])->name('user.index');
     Route::get('/user/create', [UserController::class, 'userCreate'])->name('user.create');
     Route::post('/user', [UserController::class, 'userStore'])->name('user.store');
     Route::get('/user/{user}', [UserController::class, 'userShow'])->name('user.show');
     Route::get('/user/{user}/edit', [UserController::class, 'userEdit'])->name('user.edit');
     Route::patch('/user/{user}', [UserController::class, 'userUpdate'])->name('user.update');
     Route::delete('/user/{user}', [UserController::class, 'userDestroy'])->name('user.destroy');
});

Auth::routes(['verify' => true]);


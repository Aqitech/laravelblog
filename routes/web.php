<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/permission/{id}', [UserController::class, 'permission'])->name('user.permission');

    Route::get('/posts', [PostsController::class, 'index'])->name('posts');
    Route::get('/posts/trashed', [PostsController::class, 'trash'])->name('posts.trashed');
    Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostsController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{id}', [PostsController::class, 'update'])->name('post.update');
    Route::get('/post/destroy/{id}', [PostsController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/kill/{id}', [PostsController::class, 'kill'])->name('post.kill');
    Route::get('/post/restore/{id}', [PostsController::class, 'restore'])->name('post.restore');

    Route::get('/tags', [TagsController::class, 'index'])->name('tags');
    Route::get('/tag/create', [TagsController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagsController::class, 'store'])->name('tag.store');
    Route::get('/tag/edit/{id}', [TagsController::class, 'edit'])->name('tag.edit');
    Route::post('/tag/update/{id}', [TagsController::class, 'update'])->name('tag.update');
    Route::get('/tag/destroy/{id}', [TagsController::class, 'destroy'])->name('tag.destroy');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
    Route::get('/category/destroy/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';

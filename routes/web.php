<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/my-posts', [PostController::class, 'userPosts'])->name('posts.user.index');
});

use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('users.profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('users.update');
    Route::get('/profile/delete', [UserController::class, 'destroy'])->name('users.delete');
    Route::delete('/profile', [UserController::class, 'delete'])->name('users.destroy');
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
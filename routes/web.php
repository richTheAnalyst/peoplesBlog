<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthorController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');


//Route::resource('/posts',PostController::class);

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');//->middleware('is_admin');



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

//auth routes
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
//

//routes for login and register of user
Route::get('/profile/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//contact route
Route::get('/about/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/about/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about/edit', [ContactController::class, 'edit'])->name('contact.edit');
//about route
Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::post('/about/edit', [AboutController::class, 'update'])->name('about.update');


//auth route for deleting user profile info
Route::delete('/profile/delete',[ProfileController::class, 'delete'])->name('profile.delete');
//

//post edit, delete and updating routes
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


//author edit routes
//Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
//});
Route::get('/users/{id}/profile', [UserController::class, 'profile'])->name('users.profile');
Route::get('/users/author', [UserController::class, 'show'])->name('profile.author');




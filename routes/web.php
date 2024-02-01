<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
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

Route::inertia('/', 'index')->name('index');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('json', [PostController::class, 'json'])->name('post.json');
});

Route::inertia('about', 'about')->name('page.about');

Route::middleware(['guest'])->group(function () {
    Route::inertia('login', 'auth/login')->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.post');

    Route::inertia('signUp', 'auth/signUp')->name('signUp');
    Route::post('signUp', [RegisterController::class, 'store'])->name('signUp.post');
});

Route::delete('logout', [LoginController::class, 'destroy'])->name('logout');

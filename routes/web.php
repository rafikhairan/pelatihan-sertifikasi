<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class)->middleware('admin');
    Route::resource('/games', GameController::class);
    Route::resource('/genres', GenreController::class)->except(['create', 'show', 'edit']);
    Route::resource('/platforms', PlatformController::class)->except(['create', 'show', 'edit']);
    Route::resource('/rentals', RentalController::class)->except(['create', 'show', 'edit', 'delete']);
    Route::get('/rentals/print', [RentalController::class, 'printPdf'])->name('rentals.print');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('/logout', [LoginController::class, 'destroy']);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [PagesController::class, 'home'])->name('home');

// Auth
Route::get('/login', [PagesController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'validateLogin'])->name('login')->middleware('guest');

Route::get('/register', [PagesController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route for clearing caches
Route::get('/clear-caches', function () {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return 'clear';
});

// Route for linking storage
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

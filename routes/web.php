<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VarietyController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])->name('home');

// Auth
Route::get('/login', [PagesController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'validateLogin'])->name('login')->middleware('guest');

Route::get('/register', [PagesController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Adminpanel routes
Route::group(['prefix' => '/adminpanel', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    // Users routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UserController::class, 'index'])->name('adminpanel.users');
        Route::get('/create', [UserController::class, 'create'])->name('adminpanel.users.create');
        Route::post('/create', [UserController::class, 'store'])->name('adminpanel.users.store');
        Route::get('/{id}', [UserController::class, 'edit'])->name('adminpanel.users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('adminpanel.users.edit');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('adminpanel.users.destroy');
    });

    // Varieties routes
    Route::group(['prefix' => 'varieties'], function() {
        Route::get('/', [VarietyController::class, 'index'])->name('adminpanel.varieties');
        Route::get('/create', [VarietyController::class, 'create'])->name('adminpanel.varieties.create');
        Route::post('/create', [VarietyController::class, 'store'])->name('adminpanel.varieties.store');
        Route::get('/{id}', [VarietyController::class, 'edit'])->name('adminpanel.varieties.edit');
        Route::put('/{id}', [VarietyController::class, 'update'])->name('adminpanel.varieties.edit');
        Route::delete('/{id}', [VarietyController::class, 'destroy'])->name('adminpanel.varieties.destroy');
    });
});

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

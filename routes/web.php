<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\AdminController;

// Show the login form
Route::get('/customer/login', [CustomerController::class, 'loginForm'])->name('customer.login');

// Handle login submission
Route::post('/customer/login', [CustomerController::class, 'login'])->name('customer.login.submit');

// Show the registration form (you'll create this view next)
Route::get('/customer/register', [CustomerController::class, 'registerForm'])->name('customer.register');

// Handle registration submission
Route::post('/customer/register', [CustomerController::class, 'register'])->name('customer.register.submit');

// Customer Dashboard Route (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::post('/properties/{property}/reviews', [CustomerController::class, 'storeReview'])->name('properties.reviews.store');
});

// Customer Logout Route
Route::post('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');

// Landlord Auth Routes
Route::prefix('landlord')->name('landlord.')->group(function () {
    Route::get('/login', [LandlordController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LandlordController::class, 'login'])->name('login.submit');

    // Registration
    Route::get('/register', [LandlordController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [LandlordController::class, 'register'])->name('register.submit');

    Route::middleware('auth:landlord')->group(function () {
        Route::get('/dashboard', [LandlordController::class, 'dashboard'])->name('dashboard');
        Route::get('/properties/create', [LandlordController::class, 'createProperty'])->name('properties.create');
        Route::post('/properties', [LandlordController::class, 'storeProperty'])->name('properties.store');
        Route::post('/logout', [LandlordController::class, 'logout'])->name('logout');
    });
});

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::patch('/properties/{property}/status', [AdminController::class, 'updatePropertyStatus'])->name('properties.update-status');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
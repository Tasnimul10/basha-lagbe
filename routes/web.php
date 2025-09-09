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
    Route::get('/customer/property/{property}', [CustomerController::class, 'propertyDetails'])->name('customer.property.details');
    Route::post('/properties/{property}/reviews', [CustomerController::class, 'storeReview'])->name('properties.reviews.store');
    
    // Property comparison routes
    Route::post('/properties/{property}/compare/add', [CustomerController::class, 'addToCompare'])->name('properties.compare.add');
    Route::post('/properties/{property}/compare/remove', [CustomerController::class, 'removeFromCompare'])->name('properties.compare.remove');
    Route::get('/customer/compare', [CustomerController::class, 'compare'])->name('customer.compare');
    Route::post('/customer/compare/clear', [CustomerController::class, 'clearCompare'])->name('customer.compare.clear');
    
    // Property favorites routes
    Route::post('/properties/{property}/favorites/add', [CustomerController::class, 'addToFavorites'])->name('properties.favorites.add');
    Route::post('/properties/{property}/favorites/remove', [CustomerController::class, 'removeFromFavorites'])->name('properties.favorites.remove');
    Route::get('/customer/favorites', [CustomerController::class, 'favorites'])->name('customer.favorites');
    
    // Property booking routes
    Route::post('/properties/{property}/book', [CustomerController::class, 'bookProperty'])->name('properties.book');
    Route::get('/customer/bookings', [CustomerController::class, 'myBookings'])->name('customer.bookings');
    
    // Property messaging routes
    Route::post('/properties/{property}/message', [CustomerController::class, 'sendMessage'])->name('properties.message.send');
    Route::get('/properties/{property}/messages', [CustomerController::class, 'viewMessages'])->name('properties.messages.view');
    Route::get('/customer/messages', [CustomerController::class, 'myMessages'])->name('customer.messages');
    
    // Property reporting routes
    Route::post('/properties/{property}/report', [CustomerController::class, 'reportProperty'])->name('properties.report');
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
        Route::get('/properties', [LandlordController::class, 'properties'])->name('properties.index');
        Route::get('/properties/create', [LandlordController::class, 'createProperty'])->name('properties.create');
        Route::post('/properties', [LandlordController::class, 'storeProperty'])->name('properties.store');
        Route::get('/properties/{property}/edit', [LandlordController::class, 'editProperty'])->name('properties.edit');
        Route::put('/properties/{property}', [LandlordController::class, 'updateProperty'])->name('properties.update');
        Route::delete('/properties/{property}', [LandlordController::class, 'deleteProperty'])->name('properties.delete');
        Route::get('/bookings', [LandlordController::class, 'bookings'])->name('bookings');
        Route::patch('/bookings/{booking}/status', [LandlordController::class, 'updateBookingStatus'])->name('bookings.update-status');
        
        // Messaging routes
        Route::post('/properties/{property}/message/{customerId}', [LandlordController::class, 'sendMessage'])->name('properties.message.send');
        Route::get('/properties/{property}/messages/{customerId}', [LandlordController::class, 'viewMessages'])->name('properties.messages.view');
        Route::get('/messages', [LandlordController::class, 'myMessages'])->name('messages');
        
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
        
        // Report management routes
        Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        Route::patch('/reports/{report}/status', [AdminController::class, 'updateReportStatus'])->name('reports.update-status');
        Route::delete('/reports/{report}/delete-property', [AdminController::class, 'deleteReportedProperty'])->name('reports.delete-property');
        
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
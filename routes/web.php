<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Home page - redirect to products listing
Route::get('/', function () {
    return view('home');
})->name('home');

// Products listing page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Product details page
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Dashboard - redirect to products page after login
Route::get('/home', function () {
    return redirect()->route('products.index');
})->name('home');


// Authenticated user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__ . '/auth.php';

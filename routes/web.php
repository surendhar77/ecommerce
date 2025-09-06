<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/products-json', function () {
    $path = public_path('api/dummyproductsapi.json');
    $products = json_decode(file_get_contents($path), true);
    return response()->json($products);
});




// Products listing page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Product details page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Dashboard - redirect to products page after login
// Route::get('/home', function () {
//     return redirect()->route('products.index');
// })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard'); // make sure you have resources/views/dashboard.blade.php
})->middleware(['auth'])->name('dashboard');

//Category Show
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

// Authenticated user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__ . '/auth.php';

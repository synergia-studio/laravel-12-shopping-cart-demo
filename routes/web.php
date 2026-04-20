<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AboutController;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\ContactController;
use  App\Http\Controllers\CvController;
use  App\Http\Controllers\TechnologiesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartCategoriesController;
use App\Http\Controllers\CartCategoryDetailsController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\CartProductDetailsController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])
     ->name('home.index');

Route::get('/home', [HomeController::class, 'index'])
     ->name('home');


Route::get('/about', [AboutController::class, 'index'])
     ->name('about');

Route::get('/cart', [CartController::class, 'index'])
     ->name('cart');
Route::get('/cart/categories', [CartCategoriesController::class, 'index'])
     ->name('cart.categories');
Route::get('/cart/category/details/{categoryId}', [CartCategoriesController::class, 'details'])
     ->name('cart.category.details');
Route::get('/cart/products', [CartProductsController::class, 'index'])
     ->name('cart.products');
Route::get('/cart/product/details/{productId}', [CartProductsController::class, 'details'])
     ->name('cart.product.details');


Route::get('/contact', [ContactController::class, 'index'])
     ->name('contact');

Route::get('/cv', [CvController::class, 'index'])
     ->name('cv');

Route::get('/technologies', [TechnologiesController::class, 'index'])
     ->name('technologies');

     /*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/category', function () {
    return view('category');
})->middleware(['auth', 'verified'])->name('category');
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'save'])->name('category.save');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/reload', [CategoryController::class, 'reload'])->name('category.reload');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'save'])->name('product.save');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/reload', [ProductController::class, 'reload'])->name('product.reload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

    
// CRUD pages routes
Route::get('/product-create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
Route::post('/add-product', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product-show/{id}', [ProductController::class, 'productShow'])->name('product.show')->middleware('auth');
Route::post('/product-edit', [ProductController::class, 'editPage'])->name('product.editPage')->middleware('auth');

// End crud pages routes

// All products from DB in admin mode
Route::get('/all-products',[ProductController::class,'productDB'])->name('allProducts')->middleware('auth');
Route::post('/all/products/search',[ProductController::class,'search'])->name('searchTitle')->middleware('auth');

// Add/show cart
Route::post('/addcart',[CartController::class,'addToCart']);
Route::get('/showcart',[CartController::class,'showCart']);
Route::get('/deletecart/{id}',[CartController::class,'deleteCart']);
Route::get('count',[CartController::class,'count']);


// CRUD operations routes
Route::get('/product-images/{id}',[ProductController::class, 'images'])->name('product.images');
Route::post('/product-delete',[ProductController::class, 'delete'])->name('product.delete');
Route::post('/product-update',[ProductController::class, 'update'])->name('product.update');
Route::post('/search',[ProductController::class, 'search'])->name('product.search');
// End crud operations routes

// Main page route
Route::get('/catalog', [ProductController::class, 'catalog']);
Route::get('/',[ProductController::class, 'allProducts'], 'allProducts')->name('product.allProducts');

// sort page
Route::post('/sort', [ProductController::class, 'sort']);

// About page
Route::get('/about',[ProductController::class, 'about']);
Route::get('/contact',[ProductController::class, 'contact']);




Auth::routes();



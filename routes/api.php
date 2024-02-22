<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function(){
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('stores')->group(function(){
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('categories')->group(function(){
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('customers')->group(function(){
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('cashier-store')->group(function(){//---Assign cashier to the store
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('expences')->group(function(){//---Assign cashier to the store
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('owner-cashier')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('pos')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('roles')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('images')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('sales-return')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('subscription')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('suppliers')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

Route::prefix('reports')->group(function(){//---Assign the cashier to the owner
    Route::get('/add-product', [ProductController::class, 'addproduct']);
});

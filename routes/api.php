
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'apiIndex']);

Route::post('/products', [ProductController::class, 'apiStore']);

// Search product by name
Route::get('/products/search', [ProductController::class, 'apiSearch']);

// Get product by ID
Route::get('/products/{productid}', [ProductController::class, 'apiShow'])
    ->whereNumber('productid');

// Update product by ID
Route::put('/products/{productid}', [ProductController::class, 'apiUpdate'])
    ->whereNumber('productid');

Route::patch('/products/{productid}', [ProductController::class, 'apiUpdate'])
    ->whereNumber('productid');

// Delete product by ID
Route::delete('/products/{productid}', [ProductController::class, 'apiDestroy'])
    ->whereNumber('productid');

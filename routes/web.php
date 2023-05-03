<?php

use App\Http\Controllers\ProductController;
use App\Models\Products;
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

// all home page
Route::get('/', function () {
    return view('welcome');
});

// all products list is home page and products list page at the same time
Route::get("/", [ProductController::class, "index"]);
Route::get("/products", [ProductController::class, "index"]);

//One product
Route::get("/products/{id}", [ProductController::class, "show"]);
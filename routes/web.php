<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


//User -----------------------------------

// all home page
Route::get('/', function () {
    return view('welcome');
});

// all products list is home page and products list page at the same time
Route::get("/", function () {
    return view("home", [
        "products" => Products::latest()->get()
    ]);
});

Route::get("/products", [ProductController::class, "index"]);

//One product 
Route::get("/products/{id}", [ProductController::class, "show"]);

Route::get("/checkout", function () {
    return view("checkout");
});

Route::get("/signup", [UserController::class, "index"]);
Route::post("/create-user", [UserController::class, "store"]);



//Admin ------------------------

Route::get("/dashboard", function () {
    return view("dashboard");
});

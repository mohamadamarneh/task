<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Login API
// login and register  note* : register is addition

Route::post('/login', [UsersController::class, "login"]);
Route::post('/register', [UsersController::class, "register"]);



// Get Categories

Route::get('/categories', [CategoriesController::class, 'categories']);



// Get Products

// Products by categury id 
Route::get('/categories/{id}', [ProductsController::class, 'category']);

//search
Route::get('/products/{search}', [ProductsController::class, 'search']);




//Cart
// note**  I usally used to take data from requist not from params but this for makes test easer

// return data represent user Id


//add product for user
Route::post('/cart/{userId}/{productId}/{quantity}', [CartController::class, 'add']);

//delete product from cart for user 
Route::delete('/cart/{userId}/{productId}', [CartController::class, 'destroy']);

//update quantity of product for user
Route::put('/cart/{userId}/{productId}/{quantity}', [CartController::class, 'update']);




//Orders 
Route::post('/order/{userId}', [OrdersController::class, 'add']);





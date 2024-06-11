<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\ProductCategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::POST('register', [AuthApiController::class, "register"]);
Route::POST('login', [AuthApiController::class, "login"]);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::GET("/logout", [AuthApiController::class, "logout"]);


});

    //product category route api
    Route::GET("/product-category", [ProductCategoryApiController::class, "getAll"]);
    Route::GET("/product-category/{id}", [ProductCategoryApiController::class, "getById"]);
    Route::POST("/product-category", [ProductCategoryApiController::class, "create"]);
    Route::PUT("/product-category/{id}", [ProductCategoryApiController::class, "update"]);
    Route::DELETE("/product-category/{id}", [ProductCategoryApiController::class, "delete"]);
    //product route api
    Route::GET("/product", [ProductApiController::class, "getAll"]);
    Route::GET("/product/{id}", [ProductApiController::class, "getById"]);
    Route::POST("/product", [ProductApiController::class, "create"]);
    Route::PUT("/product/pembelian/{id}", [ProductApiController::class, "pembelian"]);
    Route::POST("/product/{id}", [ProductApiController::class, "update"]);
    Route::DELETE("/product/{id}", [ProductApiController::class, "delete"]);

<?php

use App\Http\Controllers\admin\ViewAdminController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CustomerAdminController;
use App\Http\Controllers\lansia\LansiaController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/loginIndex', [ViewController::class, 'loginIndex']);
Route::get('/registerIndex', [ViewController::class, 'registerIndex']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [ViewController::class, 'berandaIndex']);

// product category
Route::get('/product_category/index', [ViewController::class, 'productCategoryIndex']);
Route::get('/product_category/create-index', [ViewController::class, 'productCategoryCreateIndex']);
Route::post('/product_category/create', [ProductCategoryController::class, 'create']);
Route::post('/product_category/edit', [ProductCategoryController::class, 'edit']);
Route::get('/product_category/delete/{id}', [ProductCategoryController::class, 'delete']);
Route::get('/product_category/edit-index/{id}', [ViewController::class, 'productCategoryEditIndex']);

// product 
Route::get('/product/index', [ViewController::class, 'productIndex']);
Route::post('/product/pembelian', [ProductController::class, 'pembelian']);
Route::get('/pembelian/index', [ViewController::class, 'pembelianIndex']);
Route::get('/product/create-index', [ViewController::class, 'productCreateIndex']);
Route::post('/product/create', [ProductController::class, 'create']);
Route::post('/product/edit', [ProductController::class, 'edit']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('/product/edit-index/{id}', [ViewController::class, 'productEditIndex']);





Route::middleware(['auth.token'])->prefix("")->group(function () {
});

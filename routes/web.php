<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
//Category module
Route::get('view-category', [CategoryController::class, 'viewCatagory']);
Route::post('create-category', [CategoryController::class, 'createCatagory']);
Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
Route::get('/category-edit/{id}', [CategoryController::class, 'edit']);
Route::put('/category-update/{id}', [CategoryController::class, 'update']);

//product module
Route::get('view-product', [ProductController::class, 'viewProduct']);
Route::post('create-product', [ProductController::class, 'createProduct']);
Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
Route::get('/product-edit/{id}', [ProductController::class, 'edit']);
Route::put('/product-update/{id}', [ProductController::class, 'update']);
//image module

Route::get('view-image', [ImageController::class, 'viewImage']);
Route::post('store-image', [ImageController::class, 'storeImage']);
Route::get('delete-image/{id}', [ImageController::class, 'destroy']);
Route::get('/image-edit/{id}', [ImageController::class, 'edit']);
Route::put('/image-update/{id}', [ImageController::class, 'update']);
Route::get('image/{id}', [ImageController::class, 'image']);

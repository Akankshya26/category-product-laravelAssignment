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
Route::controller(CategoryController::class)->group(function () {
    Route::get('view-category', 'viewCatagory');
    Route::post('create-category', 'createCatagory');
    Route::get('delete-category/{id}', 'destroy');
    Route::get('/category-edit/{id}', 'edit');
    Route::put('/category-update/{id}', 'update');
});

//product module
Route::controller(ProductController::class)->group(function () {
    Route::get('view-product', 'viewProduct');
    Route::post('create-product', 'createProduct');
    Route::get('delete-product/{id}', 'destroy');
    Route::get('/product-edit/{id}', 'edit');
    Route::put('/product-update/{id}', 'update');
});
//image module
Route::controller(ImageController::class)->group(function () {
    Route::get('view-image', 'viewImage');
    Route::post('store-image', 'storeImage');
    Route::get('delete-image/{id}', 'destroy');
    Route::get('/image-edit/{id}', 'edit');
    Route::put('/image-update/{id}', 'update');
    Route::get('image/{id}',  'image');
});

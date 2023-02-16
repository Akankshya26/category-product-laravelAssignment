<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
//auth routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout ');
});

Route::get('profile', [AuthController::class, 'profile'])->name('profile');


//Category module
Route::controller(CategoryController::class)->group(function () {
    Route::get('view-category', 'viewCatagory');
    Route::post('create-category', 'createCatagory');
    Route::get('delete-category/{id}', 'destroy');
    Route::get('/category-edit/{id}', 'edit');
    Route::put('/category-update/{id}', 'update');
    Route::get('view-list', 'listCategory');
});

//product module
Route::controller(ProductController::class)->group(function () {
    Route::get('view-product', 'viewProduct');
    Route::post('create-product', 'createProduct');
    Route::get('delete-product/{id}', 'destroy');
    Route::get('product-edit/{id}', 'edit');
    Route::put('product-update/{id}', 'update');
    Route::get('view_category_product/{category_id}', 'products');
    Route::get('/serch-product', 'serachProduct')->name('search.product');
    Route::get('/new-arrival', 'newArrival');
});
//image module
Route::controller(ImageController::class)->group(function () {
    Route::get('view-image', 'viewImage');
    Route::post('store-image', 'storeImage');
    Route::get('delete-image/{id}', 'destroy');
    Route::get('image-edit/{id}', 'edit');
    Route::put('image-update/{id}', 'update');
    Route::get('image/{id}',  'image');
});

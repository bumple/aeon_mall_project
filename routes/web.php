<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
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

Route::get('/', function () {
    return view('admin.layouts.master');
});

Route::prefix('admin')->group(function (){
    Route::resources([
        'images' => ImageController::class,
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
        'products' => ProductController::class
    ]);
    Route::get('products/{product}/detail', [ProductController::class, 'detail'])->name('products.detail');
});


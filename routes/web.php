<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UiController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('admin.layouts.master');
//});

Route::prefix('admin')->group(function (){
    Route::resources([
        'images' => ImageController::class,
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
        'products' => ProductController::class
    ]);

    Route::get('index',[AdminController::class,'index'])->name('admin.index');
    Route::get('products/{product}/detail', [ProductController::class, 'detail'])->name('products.detail');
    Route::delete('products/deleteAll', [ProductController::class, 'destroyAll'])->name('products.destroyAll');
});

Route::middleware(['locale'])->prefix('product')->group(function (){
    Route::get('/',[UiController::class,'index'])->name('product.index');
    Route::get('/shop-page', [UiController::class, 'list_shop'])->name('product.shop');
});

Route::prefix('user')->group(function (){
    Route::get('/login',[UserController::class,'showFormLogin'])->name('user.showFormLogin');
    Route::post('/login',[UserController::class,'login'])->name('user.login');
    Route::get('/register',[UserController::class,'showFormRegister'])->name('user.showFormRegister');
    Route::post('/store',[UserController::class,'store'])->name('user.store');
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
});

Route::prefix('language')->group(function (){
    Route::get('/{language}',[LangController::class,'changeLanguage'])->name('language');
});

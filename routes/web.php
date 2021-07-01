<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
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
        'images' => Image::class,
        'categories' => Category::class,
        'brands' => Brand::class
    ]);
});

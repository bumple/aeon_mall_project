<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UiController extends Controller
{
    public function cart()
    {
        if (Session::has('email_user')) {
            $users = User::where('email', Session::get('email_user'))->get();
            $user = $users[0];
            $products = Product::with('category', 'brand', 'images')->get();
            return view('user.cart', compact('user', 'products'));
        }
        $products = Product::with('category', 'brand', 'images')->get();
        return view('user.cart', compact('products'));
    }

    public function list_shop()
    {
        if (Session::has('email_user')) {
            $users = User::where('email', Session::get('email_user'))->get();
            $user = $users[0];
            $products = Product::with('category', 'brand', 'images')->get();

            return view('user.shop', compact('user', 'products'));
        }
        $products = Product::with('category', 'brand', 'images')->get();

        return view('user.shop', compact('products'));
    }

    public function index()
    {
        if (Session::has('email_user')) {
            $users = User::where('email', Session::get('email_user'))->get();
            $user = $users[0];
            $products = Product::with('category', 'brand', 'images')->get();
            return view('user.index', compact('user', 'products'));
        }
        $products = Product::with('category', 'brand', 'images')->get();
        return view('user.index', compact('products'));
    }

    public function detail($id)
    {

        if (Session::has('email_user')) {
            $users = User::where('email', Session::get('email_user'))->get();
            $user = $users[0];
            $product = Product::with('images', 'category', 'brand')->where('id', $id)->get();
            $product1 = $product[0];

            $products = Product::with('images', 'category', 'brand')->get();
            $categories = Category::all();
            $brands = Brand::all();
            dd($product1);
            $relate_brand_products = $this->list_relationship_brand_products($id);

            return view('user.single-product', compact('product1', 'relate_brand_products', 'brands', 'user', 'products', 'categories'));
        }
        $product1 = Product::with('images', 'category', 'brand')->where('id', $id)->get();
        $product1 = $product1[0];
        $products = Product::with('images', 'category', 'brand')->get();

        $brands = Brand::all();
        $categories = Category::all();
        $relate_brand_products = $this->list_relationship_brand_products($id);
        return view('user.single-product', compact('product1', 'relate_brand_products', 'brands', 'products', 'categories'));
    }

    public function list_relationship_brand_products($product_id)
    {
        $product = Product::where('id', $product_id)->get();
        $brand_id = $product[0]->brand_id;
        return Product::with('images', 'category', 'brand')->where('brand_id', $brand_id)->get();
    }

    public function list_relationship_category_products($product_id)
    {
        $product = Product::where('id', $product_id)->get();
        $category_id = $product[0]->category_id;
        return Product::with('images', 'category', 'brand')->where('category_id', $category_id)->get();
    }

    public function getSearch(Request $request){
            return view('user.searchajax');
    }

    public function getSearchAjax(){

    }


}

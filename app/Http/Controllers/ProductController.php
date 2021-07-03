<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'brand')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact(['brands', 'categories']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'unit_price' => 'required',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->fill($request->all());
        $product->brand_id = $request->input('brand_id');
        $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product_id = $id;
        return view('admin.images.create', compact('product_id'));
    }

    public function detail($id)
    {
        $product = Product::with('category', 'brand')->where('id',$id)->get();
        $images = $product[0]->images;
        return view('admin.products.detail', compact(['product','images']));
    }

    public function edit($id)
    {
        return view('admin.products.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->images()->update(['product_id' => null]);
        $product->delete();

        return redirect()->route('products.index');
    }
}

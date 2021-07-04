<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'brand')->paginate(7);
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
        $unlink = new ImageController();
        $unlink->unlink($id);
        $product = Product::findOrFail($id);
        Image::where('product_id',$id)->delete();
        $product->delete();

        return redirect()->route('products.index');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        Product::where('id', explode(",",$ids))->delete();
        return response()->json(['success'=>"Deleted successfully"]);
    }
}

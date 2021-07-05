<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $this->isPermission('admin');
        $products = Product::with('category', 'brand')->paginate(7);

        return view('admin.products.index', compact('products'));
    }



    public function create()
    {
        $this->isPermission('admin');
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact(['brands', 'categories']));
    }

    public function store(Request $request)
    {
        $this->isPermission('admin');
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
        $this->isPermission('admin');

        $product_id = $id;
        return view('admin.images.create', compact('product_id'));
    }

    public function detail($id)
    {
        $this->isPermission('admin');

        $product = Product::with('category', 'brand')->where('id',$id)->get();
        $images = $product[0]->images;
        return view('admin.products.detail', compact(['product','images']));
    }

    public function edit($id)
    {
        $this->isPermission('admin');
        $product = Product::with('category','brand','images')->where('id',$id)->get();
        $images = $product[0]->images;
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'images', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->isPermission('admin');
        $request->validate([
            'product_name' => 'required',
            'unit_price' => 'required',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'unit_price' => $request->unit_price,
            'description' => $request->description,
            'brand_id' => $request->input('brand_id') ,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->isPermission('admin');

        $image = new ImageController();
        $image->unlink($id);
        $product = Product::findOrFail($id);
        Image::where('product_id',$id)->delete();
        $product->delete();

        return redirect()->route('products.index');
    }

    public function destroyAll(Request $request)
    {
        $this->isPermission('admin');
        $ids = $request->ids;
        Product::where('id', explode(",",$ids))->delete();
        return response()->json(['success'=>"Deleted successfully"]);
    }


}

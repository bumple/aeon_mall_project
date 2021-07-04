<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.brands.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->save();

        $message = "Add brand $request->name success";
        Session::flash('create_success', $message);
        return redirect()->route('brands.create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required'
        ]);

        DB::table('brands')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);

        $message = "Update brand $request->name success";
        Session::flash('update_success', $message);
        return redirect()->route('brands.create');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->products()->update(['brand_id' => null]);
        $brand->delete();

        return redirect()->route('brands.create');
    }
}

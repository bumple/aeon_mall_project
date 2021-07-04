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
        $this->isPermission('admin');

        //
    }

    public function create()
    {
        $this->isPermission('admin');

        $brands = Brand::all();
        return view('admin.brands.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $this->isPermission('admin');

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
        $this->isPermission('admin');

        //
    }

    public function edit($id)
    {
        $this->isPermission('admin');

        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->isPermission('admin');

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
        $this->isPermission('admin');

        $brand = Brand::findOrFail($id);
        $brand->products()->update(['brand_id' => null]);
        $brand->delete();

        return redirect()->route('brands.create');
    }
}

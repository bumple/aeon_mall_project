<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index()
    {
        $this->isPermission('admin');

        //
    }

    public function create()
    {
        $this->isPermission('admin');

        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->isPermission('admin');

        $request->validate([
            'name' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        $message = "Add category $request->name success";
        Session::flash('create_success', $message);
        return redirect()->route('categories.create');
    }

    public function show($id)
    {
        $this->isPermission('admin');

        //
    }

    public function edit($id)
    {
        $this->isPermission('admin');

        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->isPermission('admin');

        $request->validate([
            'name' => 'required'
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $request->input('name')]);

        $message = "Update category $request->name success";
        Session::flash('update_success', $message);
        return redirect()->route('categories.create');

    }

    public function destroy($id)
    {
        $this->isPermission('admin');

        $category = Category::findOrFail($id);

        $category->products()->update(['category_id' => null]);
        $category->delete();

        return redirect()->route('categories.create');

    }
}

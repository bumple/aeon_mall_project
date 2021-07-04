<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function index()
    {
        $this->isPermission('admin');

        //
    }

    public function create()
    {
        $this->isPermission('admin');


    }

    public function store(Request $request)
    {
        $this->isPermission('admin');


    }

    public function show($id)
    {
        $this->isPermission('admin');

        //
    }

    public function edit($id)
    {
        $this->isPermission('admin');

        //
    }

    public function update($id, Request $request)
    {
        $this->isPermission('admin');

        $request->validate([
            'filenames' => 'required'
        ]);
        if ($request->hasfile('filenames')) {
            $images = $request->file('filenames');
            foreach($images as $image) {
                $name = rand(1, 100) . date('Y-m-d_h:i:s') . '.' . $image->extension();
                $image->storeAs("public/uploads/$id", $name);
                Image::create([
                    'product_id' => $id,
                    'image' => $name,
                ]);
            }
        }
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->isPermission('admin');

        //
    }

    public function unlink($id)
    {
        $this->isPermission('admin');

        $images = Image::where('product_id',$id)->get();
        foreach ($images as $image) {
            File::delete("storage/uploads/$id/$image->image");
        }

    }
}

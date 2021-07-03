<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

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
        //
    }
}

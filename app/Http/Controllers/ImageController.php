<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $files = [];
        $image = new Image();
        $image->product_id = $id;

        if ($request->hasFile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = rand(1, 100) . date('Y-m-d_h:i:s') . '.' . $file->extension();
                $file->storeAs('public/uploads', $name);
                $files[] = $name;
                $image->image = $name;
                $image->save();
            }
        }

        $image->image = $files;
        $image->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

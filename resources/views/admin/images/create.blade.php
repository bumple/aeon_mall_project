@extends('admin.layouts.master')
@section('title', 'This is create photo page')
@section('content')
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>Add photo</h3>
                </div>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                </div>
            </div>
            <form action="{{ route('images.update', $product_id) }}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="file" name="filenames[]" class="form-control" multiple>
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-grd-primary col-sm-4" type="submit" style="margin-left: 32%">Add product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

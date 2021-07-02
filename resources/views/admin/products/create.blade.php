@extends('admin.layouts.master')
@section('title', 'This is page create product')
@section('content')
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>Create product</h3>
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
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" name="product_name" class="form-control"
                                   placeholder="Product Name">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="unit_price" class="form-control"
                                   placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea rows="5" cols="5" name="description" class="form-control"
                                      placeholder="Description product"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <select name="brand_id" class="form-control">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="category_id" class="form-control">
                                <option value="opt1">Select Category</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option value="">Not data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-grd-primary col-sm-4" type="submit" style="margin-left: 32%">Add
                            product
                        </button>
                    </div>
                </div>
            </form>
@endsection

@extends('admin.layouts.master')
@section('title', 'This is update page')
@section('content')
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>Update product</h3>
                </div>
                <div class="card-header-right">
                    <a href="{{ route('products.index') }}"><i class="ti-arrow-left"></i></a>
                    <a href="#"><i class="ti-marker-alt"></i></a>
                    <a href="#"><i class="ti-close"></i></a>
                </div>
            </div>
            <form action="{{ route('products.update',$product[0]->id) }}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" name="product_name" class="form-control"
                                   value="{{ $product[0]->product_name }}">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="unit_price" class="form-control"
                                   value="{{ $product[0]->unit_price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea rows="5" cols="5" name="description"
                                      class="form-control">{{ $product[0]->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <select name="brand_id" class="form-control">
                                <option value="{{ $product[0]->brand->id }}"
                                        selected>{{ $product[0]->brand->name }}</option>
                                @foreach($brands as $brand)
                                    @if($brand->id !== $product[0]->brand->id)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="category_id" class="form-control">
                                <option value="{{ $product[0]->category->id }}"
                                        selected>{{ $product[0]->category->name }}</option>
                                @forelse($categories as $category)
                                    @if($category->id !== $product[0]->category->id)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @empty
                                    <option value="">Not data</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-grd-primary col-sm-4" type="submit" style="margin-left: 32%">Update
                            product
                        </button>
                    </div>
                </div>
            </form>

@endsection

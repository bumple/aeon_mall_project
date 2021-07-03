@extends('admin.layouts.master')
@section('title', 'This is detail product page')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Product Price</h5>
                <h2>{{ $product[0]->unit_price }} &euro;</h2>
                <div class="card-header-right">
                    <a href="{{ route('products.index') }}"><i class="ti-arrow-left"></i></a>
                    <a href="{{ route('products.edit', $product[0]->id) }}"><i class="ti-marker-alt"></i></a>
                    <form action="{{ route('products.destroy', $product[0]->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure?')"> <i class="ti-close"></i></button>
                    </form>
{{--                    <a href="{{ route('products.destroy') }}"--}}
{{--                       onclick="return confirm('Are you sure?')"><i class="ti-trash"></i></a>--}}
                </div>
            </div>
            <div class="card-block">
                <div class="card-title">
                    <h4>{{ $product[0]->product_name }}</h4>
                </div>
                <div class="card-img" style="alignment: center">
                    @foreach($images  as $image)
                        <img src="{{ asset('storage/uploads/'.$product[0]->id.'/'.$image->image)  }}" alt="img" style="margin-left: 30%">
                    @endforeach
{{--                    @foreach($product[0]->images as $image)--}}
{{--                        <img src="{{ asset("storage/uploads/$image->image")  }}" alt="img" style="margin-left: 30%">--}}
{{--                        @break--}}
{{--                    @endforeach--}}
                </div>
                <div class="card-body">
                    <label for="card-body">Description:</label>
                    <p>{{ $product[0]->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

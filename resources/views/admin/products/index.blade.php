@extends('admin.layouts.master')
@section('title', 'This is list page')
@section('content')
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>This is list products</h3>
                </div>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li>
                            <i class="icofont icofont-close-squared "></i>
                        </li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block p-b-10">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Photo</th>
                            <th></th>
                            <th>
                                <div class="form-group">
                                    <input type="checkbox" class="check_all" id="master">
                                    {{--                                    <button style="margin-bottom: 10px" class="btn btn-primary delete_all active"--}}
                                    {{--                                            data-url="{{ route('products.destroyAll')  }}">X--}}
                                    {{--                                    </button>--}}
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $key => $product)
                            <tr>
                                <td>
                                    <div class="task-contain">
                                        <h6 class="bg-c-blue d-inline-block text-center">{{ ++$key }}</h6>
                                        <p class="d-inline-block m-l-20"><a
                                                href="{{ route('products.detail', $product->id) }}">{{ $product->product_name }}</a>
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <p class="d-inline-block m-r-20">{{ $product->unit_price }}</p>

                                </td>
                                @if($product->category_id)
                                <td>
                                    <p class="d-inline-block m-r-20"><a
                                            href="{{ route('categories.edit', $product->category->id) }}">{{ $product->category->name }}</a>
                                    </p>
                                    @else
                                        <td><p>Not category</p></td>
                                </td>
                                @endif
                                @if($product->brand_id)
                                    <td>
                                        <p class="d-inline-block m-r-20">
                                            <a href="{{ route('brands.edit', $product->brand->id) }}">{{ $product->brand->name }}
                                            </a>
                                        </p>
                                @else
                                    <td><p>No brand</p></td>
                                    </td>
                                @endif
                                <td>
                                    @foreach($product->images as $image)
                                        <img src="{{ asset("storage/uploads/$product->id/$image->image")  }}" alt="img"
                                             width="150px">
                                        @break
                                    @endforeach
                                </td>
                                <td><a href="{{ route('products.show', $product->id) }}"><i
                                            class="ti-layout-grid2-alt"></i></a></td>
                                <td>
                                    <input type="checkbox" name="delete" data-id="{{ $product->id }}"
                                           class="custom_name" value="{{ $product->id }}"
                                           id="delete_{{ $product->id }}">
                                </td>
                            </tr>
                        @empty
                            <td>Not data</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div id="styleSelector">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="fixed-button">
        <a href="{{ route('products.create') }}" class="btn btn-md btn-primary">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Create new product
        </a>
    </div>
    </div>
    </div>
@endsection

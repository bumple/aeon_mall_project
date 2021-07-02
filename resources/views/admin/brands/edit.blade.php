@extends('admin.layouts.master')
@section('title', 'This is edit brand page')
@section('content')
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>This is page create brand</h3>
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
            <div class="card-block ">
                <form action="{{ route('brands.update', $brand->id) }}" method="post">
{{--                    {{ method_field('PUT') }}--}}
                    <div class="form-group row">
                        @method('put')
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger col-sm-12">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('update_success'))
                            <div class="alert alert-success col-sm-12"><p>{{ session()->get('update_success') }}</p>
                            </div>
                        @endif
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control form-control-bold"
                                   value="{{ $brand->name }}" >
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-inverse" data-container="body" data-toggle="popover"
                                    title="Inverse color states" data-placement="bottom">Submit
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

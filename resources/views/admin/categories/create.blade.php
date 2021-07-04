@extends('admin.layouts.master')
@section('title', 'This is create category page')
@section('content')
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>This is page create category</h3>
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
                <form action="{{ route('categories.store') }}" method="POST">
                    <div class="form-group row">
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
                        @if(session()->has('create_success'))
                            <div class="alert alert-success col-sm-12"><p>{{ session()->get('create_success') }}</p>
                            </div>
                        @endif
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control form-control-bold"
                                   placeholder="Category Name">
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
    <div class="col-md-12 col-xl-12">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h3>This is list categories</h3>
                </div>
            </div>
            <div class="card-block p-b-10">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Categoryr name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td>
                                    <div class="task-contain">
                                        <h6 class="bg-c-blue d-inline-block text-center">{{ ++$key }}</h6>
                                        <p class="d-inline-block m-l-20">{{ $category->name }}
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <p class="d-inline-block m-r-20"><a href="{{ route('categories.edit', $category->id) }}"><i class="ti-pencil"></i></a></p>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')"> <i class="ti-close"></i></button>
                                    </form>
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
@endsection

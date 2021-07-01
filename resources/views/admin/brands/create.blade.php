@extends('admin.layouts.master')
@section('title', 'This is create page')
@section('content')
    <div class="col-md-12 col-xl-6">
        <div class="card project-task">
            <div class="card-header">
                <div class="card-header-left ">
                    <h5>Time spent : project &amp; task</h5>
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
            <div class="card-block p-b-10">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Project & Task</th>
                            <th>Time Spents</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="task-contain">
                                    <h6 class="bg-c-blue d-inline-block text-center">U</h6>
                                    <p class="d-inline-block m-l-20">UI Design</p>
                                </div>
                            </td>
                            <td>
                                <p class="d-inline-block m-r-20">4 : 36</p>
                                <div class="progress d-inline-block">
                                    <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="task-contain">
                                    <h6 class="bg-c-pink d-inline-block text-center">R</h6>
                                    <p class="d-inline-block m-l-20">Redesign Android App</p>
                                </div>
                            </td>
                            <td>
                                <p class="d-inline-block m-r-20">4 : 36</p>
                                <div class="progress d-inline-block">
                                    <div class="progress-bar bg-c-pink" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="task-contain">
                                    <h6 class="bg-c-yellow d-inline-block text-center">L</h6>
                                    <p class="d-inline-block m-l-20">Logo Design</p>
                                </div>
                            </td>
                            <td>
                                <p class="d-inline-block m-r-20">4 : 36</p>
                                <div class="progress d-inline-block">
                                    <div class="progress-bar bg-c-yellow" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="task-contain">
                                    <h6 class="bg-c-green d-inline-block text-center">A</h6>
                                    <p class="d-inline-block m-l-20">Appestia landing Page</p>
                                </div>
                            </td>
                            <td>
                                <p class="d-inline-block m-r-20">4 : 36</p>
                                <div class="progress d-inline-block">
                                    <div class="progress-bar bg-c-green" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="task-contain">
                                    <h6 class="bg-c-blue d-inline-block text-center">L</h6>
                                    <p class="d-inline-block m-l-20">Logo Design</p>
                                </div>
                            </td>
                            <td>
                                <p class="d-inline-block m-r-20">4 : 36</p>
                                <div class="progress d-inline-block">
                                    <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

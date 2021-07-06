<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function isPermission($permission): bool
    {
        if (!Gate::allows($permission, Auth::user())) {
            abort(403);
        }
        return true;
    }

//    function isLogined()
//    {
//        if (!Auth::check()){
//            return redirect()->route('product.index')->with('error','Bạn cần đăng nhập để sử dụng chắc năng giỏ hàng!');
//        }
//    }

}

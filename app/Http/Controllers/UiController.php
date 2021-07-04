<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UiController extends Controller
{
    public function list_shop()
    {
        if (Session::has('email_user')){
            $users = User::where('email',Session::get('email_user'))->get();
            $user = $users[0];
            return view('user.shop',compact('user'));
        }

        return view('user.shop');
    }

    public function index()
    {
        if (Session::has('email_user')){
            $users = User::where('email',Session::get('email_user'))->get();
            $user = $users[0];
            return view('user.index',compact('user'));
        }
        return view('user.index');
    }
}

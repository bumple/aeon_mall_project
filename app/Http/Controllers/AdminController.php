<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $this->isPermission('admin');
        return view('admin.layouts.master')->with('message','Chào sếp đến với trang quản trị');
    }

    public function sendEmailPromotion(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $details = [
            'title' => 'Welcome to Boutique Brothers!',
            'url' => 'https://www.Codegym.vn'
        ];
dd($request->input('email'));
        Mail::to($request->input('email'))->send(new UserRegisteredMail($details));
    }
}

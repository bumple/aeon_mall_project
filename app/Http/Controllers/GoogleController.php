<?php

namespace App\Http\Controllers;

use App\Mail\UserRegisteredMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                Session::put('email_user',$finduser['email']);

                return redirect()->route('product.index');

            }else{

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);

                $details = [
                    'title' => 'Welcome to Boutique Brothers, you are registered successfully!',
                    'url' => 'https://www.Codegym.vn'
                ];

                Mail::to($newUser->email)->send(new UserRegisteredMail($details));

                return redirect()->route('product.index');
            }

        } catch (Exception $e) {
            dd($e->getMessage(), 1);
        }
    }
}

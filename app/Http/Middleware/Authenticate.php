<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
//            $warning = 'Bạn cần đăng nhập để sử dụng chắc năng giỏ hàng!';
            session()->flash('warning','Bạn cần đăng nhập để sử dụng chắc năng giỏ hàng!');

//            return redirect()->route('user.showFormLogin')->with('error','Bạn cần đăng nhập để sử dụng chắc năng giỏ hàng!');
            return route('user.showFormLogin',);
        }
    }
}

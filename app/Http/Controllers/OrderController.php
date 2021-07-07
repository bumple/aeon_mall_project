<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        if (Session::has($user_id . 'cart')) {
            $order_cart = Session::get($user_id . 'cart');
            $test = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
//            dd($test);
            Order::create([
                'order_date' => date('Y-m-d H:i:s'),
                'user_id' => $user_id,
            ]);
            foreach ($order_cart->items as $key => $item) {
//                dd($item);
                OrderProduct::create([
                    'product_id' => $key,
                    'quantity_order' => $item['quantity'],
                    'price_order' => $item['price'],
                    'total_price' => $item['quantity'] * $item['price'],
                ]);
            }
        }
//        dd(session()->all());
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}

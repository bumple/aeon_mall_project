<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {

        $user_id = Auth::id();

        $product = Product::with('images', 'brand', 'category')->where('id', $id)->get();
        $product = $product[0];
        $oldCart = Session::has($user_id . 'cart') ? Session::get($user_id . 'cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);


        $users = User::where('email', Session::get('email_user'))->get();
        $user = $users[0];

        $request->session()->put($user_id.'cart', $cart);

        Session::flash('message', 'Add to cart success');
        return response()->json($cart);
    }

    public function showCart(Request $request)
    {

        if (Session::has('email_user')) {
            $users = User::where('email', Session::get('email_user'))->get();
            $user = $users[0];
            $products = Product::with('category', 'brand', 'images')->get();

            $user_id = Auth::id();

            $oldCart = Session::get($user_id . 'cart');

            $cart = new Cart($oldCart);

            $items = $cart->items;

            $check_info = User::find($user_id)->info;
//            if ($check_info) {
//                // send email
//                return redirect()->route('orders.index');
//            }

            return view('user.cart', [
                'items' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQuantity' => $cart->totalQuantity,
                'cart' => $cart,
                'products' => $products,
                'check_info' => $check_info
            ])->with('user', $user);

        }

        $users = User::where('email', Session::get('email_user'))->get();
        $user = $users[0];
        $products = Product::with('category', 'brand', 'images')->get();



        return redirect()->route('product.index', compact('user'))->with('products', $products);
    }

    public function deleteCart($id)
    {
        $user_id = Auth::id();
        if (Session::has($user_id . 'cart')) {
            $oldCart = Session::get($user_id . 'cart');
            $cart = new Cart($oldCart);
            $cart->delete($id);
            session()->put($user_id . 'cart', $cart);
        }
        return redirect()->route('product.cart');
    }

    public function reduceByOne($id)
    {
        $user_id = Auth::id();
        $oldCart = Session::has($user_id . 'cart') ? Session::get($user_id . 'cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);
        if (count($cart->items) > 0) {
            Session::put($user_id . 'cart', $cart);
        } else {
            Session::forget($user_id . 'cart');
        }
        return response()->json($cart);
    }

    public function increaseByOne($id)
    {
        $user_id = Auth::id();
        $oldCart = Session::has($user_id . 'cart') ? Session::get($user_id . 'cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseOne($id);
        Session::put($user_id . 'cart', $cart);
        return response()->json($cart);
    }
}

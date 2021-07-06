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
        $product = Product::with('images', 'brand', 'category')->where('id', $id)->get();
        $product = $product[0];
        $authId = Auth::id();
        $oldCart = Session::has("$authId.cart") ? Session::get($authId.'cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        dd($cart);

//        $users = User::where('email', Session::get('email_user'))->get();
//        $user = $users[0];
//        $request->session()->put([ "$authId.cart" => $cart]);
        Session::put($authId.'cart', $cart);
dd(\session()->all());
        return redirect()->route('product.cart')->with('message', 'Add to cart success');
    }

    public function showCart(Request $request)
    {

        if (Session::has('email_user')) {
            $users = User::where('email', Session::get('email_user'))->get();
            $user = $users[0];
            $products = Product::with('category', 'brand', 'images')->get();
            $auth_id = Auth::id();

            $oldCart = Session::get("$auth_id");
            $cart = new Cart($oldCart);
            $products_cart = $cart->items;
            $totalPrice = $cart->totalPrice;
            $totalQuantity = $cart->totalQuantity;
            return view('user.cart',compact('products_cart','cart','products','totalQuantity','totalPrice','user'));

//            return view('user.cart', [
//                'products_cart' => $cart->items,
//                'totalPrice' => $cart->totalPrice,
//                'totalQuantity' => $cart->totalQuantity,
//            ])->with('user', $user,);
        }

        $users = User::where('email', Session::get('email_user'))->get();
        $user = $users[0];
        $products = Product::with('category', 'brand', 'images')->get();
        return redirect()->route('product.index', compact('user','products'));
    }

    public function deleteCart($id)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $cart->delete($id);
            session()->put('cart', $cart);
        }
        return redirect()->route('products.showCart');
    }

    public function reduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return response()->json($cart);
    }

    public function increaseByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseOne($id);
        Session::put('cart', $cart);
        return response()->json($cart);
    }
}

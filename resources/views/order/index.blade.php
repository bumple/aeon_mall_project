@extends('core.master')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping information</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <div class="woocommerce-info">Have a coupon? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                            </div>

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                </p>

                                <div class="clear"></div>
                            </form>
                            <h3 id="order_review_heading">Here's your order summary</h3>

                            <div id="order_review" style="position: relative;">
                                <table class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product name</th>
                                        <th class="product-total">Image</th>
                                        <th class="product-total">Quantity</th>
                                        <th class="product-total">Sub total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($info_carts->items as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $item['item']->product_name }}
                                        </td>
                                        <td class="product-total">
                                         <img src="{{ asset("storage/uploads/".$item['image'][0]->product_id.'/'.$item['image'][0]->image) }}" alt="">
                                        </td>
                                        <td class="product-name">
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td class="product-name">
                                            {{ $item['total'] }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <th class="product-total" colspan="2">Total</th>
                                        <th class="product-total" >{{ $info_carts->totalQuantity }}</th>
                                        <th class="product-total" >{{ $info_carts->totalPrice }}</th>
                                    </tr>
                                </table>
                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">
                                <h3 id="order_review_heading">Your order is being shipped to</h3>
                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Shipping address</th>
                                            <th class="product-total">Information</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                            Customer name
                                            </td>
                                            <td class="product-total">
                                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Customer phone
                                            </td>
                                            <td class="product-total">
                                                {{ $info_customers->phone }}
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Province
                                            </td>
                                            <td class="product-total">
                                                {{ $info_customers->province }}
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                District
                                            </td>
                                            <td class="product-total">
                                                {{ $info_customers->district }}
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Ward
                                            </td>
                                            <td class="product-total">
                                                {{ $info_customers->ward }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-row place-order" style="float: right">
{{--                                        <form action="{{ route('orders.update', 1) }}">--}}
                                        <input type="submit" data-value="Place order" value="Payment now" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
{{--                                        </form>--}}
                                    </div>
                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_cheque">Cheque Payment </label>
                                                <div style="display:none;" class="payment_box payment_method_cheque">
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_paypal">
                                                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                                <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a>
                                                </label>
                                                <div style="display:none;" class="payment_box payment_method_paypal">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

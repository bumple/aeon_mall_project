@extends('core.master')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        @foreach($products as $key => $product)
                            @if($key>4)
                                @break
                            @endif

                            <div class="thubmnail-recent">
                                @forelse($product->images as $image)
                                    <img src="{{asset("storage/uploads/$product->id/$image->image")}}"
                                         class="recent-thumb" alt="">
                                    @break
                                @empty
                                    <p>Not data</p>
                                @endforelse
                                <h2><a href="{{route('product.detail',$product->id)}}">{{$product->product_name}}</a>
                                </h2>
                                <div class="product-sidebar-price">
                                    <ins>{{$product->unit_price." VNĐ"}}</ins>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <!-- Recent Posts -->
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce ">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!is_null($items))
                                        @forelse($items as $item)
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove"
                                                       href="{{ route('product.deleteCart', $item['item']['id']) }}">×</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    @forelse($item['image'] as $image)
                                                        <a href="{{ route('product.detail', $image->product_id) }}">
                                                            <img width="145" height="145" alt="" class="shop_thumbnail"
                                                                 src="{{ asset("storage/uploads/$image->product_id/$image->image")  }}"></a>
                                                        @break
                                                    @empty
                                                        <p>Not data</p>
                                                    @endforelse
                                                </td>

                                                <td class="product-name">
                                                    <a href="single-product.blade.php">{{ $item['item']['product_name'] }}</a>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount">{{ $item['item']['unit_price'] }}</span>
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <input href="javascript:"
                                                               onclick="reduce({{ $item['item']['id'] }});"
                                                               type="button"
                                                               class="minus" value="-">
                                                        <input type="number" size="4"
                                                               class="quantity-item-{{ $item['item']['id'] }}"
                                                               title="Qty" value="{{ $item['item']['quantity'] }}">
                                                        <input href="javascript:" type="button"
                                                               onclick="increase({{ $item['item']['id'] }});"
                                                               class="plus" value="+">
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                <span
                                                    class="total-price-{{ $item['item']['id'] }}"
                                                    id="amount">{{ $item['price'] * $item['quantity'] }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>Not data</td>
                                            </tr>
                                        @endforelse
                                    @endif
                                    <tr>
                                        <th colspan="4">
                                            <p>Total</p>
                                        </th>
                                        <td>
                                            <p id="total-quantity-cart">{{ $totalQuantity }}</p>
                                        </td>
                                        <td>
                                            @if($products)
                                                <p id="total-amount"><strong>{{ $totalPrice }}</strong></p>
                                            @else
                                                <p>Not data</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <input type="submit" value="Continue Shopping" name="update_cart"
                                                   class="button">
                                            <input type="submit" value="Checkout" name="proceed"
                                                   class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                            <form action="{{ route('send.email') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="cart_totals" style="width: 100%">
                                        <h2>Đăng ký nhận tin</h2>
                                        <h5>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</h5>
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td><input style="width: 80%" type="email" name="email"
                                                           placeholder="Email của bạn">
                                                    <button type="submit">Đăng ký</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="cart-collaterals" style="width: 100%">
                                    <div class="cross-sells">
                                        <h2>You may be interested in...</h2>
                                        <ul class="products">
                                            <li class="product">
                                                <a href="single-product.blade.php">
                                                    <img width="325" height="325" alt="T_4_front"
                                                         class="attachment-shop_catalog wp-post-image"
                                                         src="img/product-2.jpg">
                                                    <h3>Ship Your Idea</h3>
                                                    <span class="price"><span class="amount">£20.00</span></span>
                                                </a>

                                                <a class="add_to_cart_button" data-quantity="1" data-product_sku=""
                                                   data-product_id="22" rel="nofollow" href="single-product.blade.php">Select
                                                    options</a>
                                            </li>

                                            <li class="product">
                                                <a href="single-product.blade.php">
                                                    <img width="325" height="325" alt="T_4_front"
                                                         class="attachment-shop_catalog wp-post-image"
                                                         src="img/product-4.jpg">
                                                    <h3>Ship Your Idea</h3>
                                                    <span class="price"><span class="amount">£20.00</span></span>
                                                </a>

                                                <a class="add_to_cart_button" data-quantity="1" data-product_sku=""
                                                   data-product_id="22" rel="nofollow" href="single-product.blade.php">Select
                                                    options</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero
                            quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi
                            iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi
                            veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to
                            your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com"
                                                                          target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

@endsection

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
                                    <ins>{{number_format($product->unit_price)." VNĐ"}}</ins>
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
                            {{--                            <form method="post" action="{{ route('orders.store') }}">--}}
                            @csrf
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
                                                           title="Qty" value="{{ $item ['quantity'] }}">
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
                                        @if($check_info)
                                            <div class="col-2">
                                                <form action="{{ route('orders.index') }}" method="get">
                                                    @csrf
                                                    <input type="submit" value="Checkout" name="proceed">
                                                </form>
                                            </div>
                                        @else
                                            <input type="submit" value="Checkout" name="proceed" data-toggle="modal"
                                                   class="myModal" data-target="#tien">
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            {{--                            </form>--}}
                            <form action="{{ route('orders.store') }}" method="post">
                                @csrf
                                <div class="">
                                    <div class="modal" id="tien" tabindex="-1">
                                        <div class="modal-dialog" style="width: 840px;
    margin: 67px auto;">
                                            <div class="modal-content" style="width: 900px; height: 500px">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong> Information shipping</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <div>
                                                                <h2>
                                                                    <label for="">
                                                                        <img src="{{ asset('img/id-card-solid.svg') }}"
                                                                             style="width: 40px; height: 40px" alt="">
                                                                    </label>
                                                                    Information
                                                                </h2>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Full Name</label>
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Phone Number</label>
                                                                <input type="text" name="phone" class="form-control">
                                                            </div>
                                                            <div class="md-form col-4">
                                                                <label for="exampleInputEmail1">Province</label>
                                                                <select class="form-control" name="province"
                                                                        id="province">
                                                                </select>
                                                            </div>
                                                            <div class="md-form col-4">
                                                                <label for="exampleInputEmail1">District</label>
                                                                <select class="form-control" name="district"
                                                                        id="district">
                                                                    <option value="">Quận/Huyện</option>
                                                                </select>
                                                            </div>
                                                            <div class="md-form col-4">
                                                                <label for="exampleInputEmail1">Ward</label>

                                                                <select class="form-control" name="ward" id="ward">
                                                                    <option value="">Phường/Xã</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-10" style="margin-left: 50%">
                                                            <div>
                                                                <h2>
                                                                    <label for="">
                                                                        <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                                    </label>
                                                                    Payment
                                                                </h2>
                                                            </div>
                                                            <div class="accordion" id="accordionExample">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox"
                                                                                   name="exampleRadios"
                                                                                   id="exampleRadios1" value="option1"
                                                                                   checked>
                                                                            <label class="form-check-label"
                                                                                   for="exampleRadios1">
                                                                                Thanh toán khi giao hàng (COD) </label>
                                                                        </div>
                                                                    </div>

                                                                    <div id="collapseOne" class="collapse show"
                                                                         aria-labelledby="headingOne"
                                                                         data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            Thanh toán khi nhân hàng
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox"
                                                                                   name="example"
                                                                                   id="exampleRadios2" value="option1"
                                                                            >
                                                                            <label class="form-check-label"
                                                                                   for="exampleRadios2">
                                                                                Chuyển khoản qua ngân hàng </label>
                                                                            <span><i
                                                                                    class="payment-icon payment-icon--3"></i></span>
                                                                        </div>
                                                                    </div>

                                                                    <div id="collapseOne" class="collapse show"
                                                                         aria-labelledby="headingOne"
                                                                         data-parent="#accordionExample">
                                                                        <div class="card-body">
                                                                            Vui lòng shi lại MÃ ĐƠN HÀNG và SỐ ĐIỆN
                                                                            THOẠI <br> của bạn vào mục Nội dung thanh
                                                                            toán.
                                                                            Đơn hàng sẽ đươc giao sau khi tiền đã được
                                                                            chuyển.<br>
                                                                            Thông tin tài khoản:
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Save changes
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                    <button class="send-mail" type="submit">Đăng ký</button>
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
                                                    @forelse($product->images as $image)

                                                    <img width="325" height="325" alt="T_4_front"
                                                         class="attachment-shop_catalog wp-post-image"
                                                         src="{{asset("storage/uploads/$product->id/$image->image")}}">
                                                    <h3><a href="{{route('product.detail',$product->id)}}">{{$product->product_name}}</a></h3>
                                                    <span class="price"><span class="amount">{{$product->unit_price}}</span>&#8363</span>
                                                        @break
                                                    @empty
                                                        <p>Not data</p>
                                                    @endforelse
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
@endsection

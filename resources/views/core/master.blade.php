@include('core.header')
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href=".."><img style="width:100px;height:100px;background-color: #f9f3f2;border-radius: 10%"
                                          src="{{asset('img/logo_shop_app.png')}}"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{route('product.cart')}}">My Cart: <span class="cart-amount">{{ \Illuminate\Support\Facades\Session::has(\Illuminate\Support\Facades\Auth::id().'cart') ? number_format(\Illuminate\Support\Facades\Session::get(\Illuminate\Support\Facades\Auth::id().'cart')->totalPrice) : '' }}</span>&#8363 <i class="fa fa-shopping-cart"></i>
                        <span class="product-count">{{ \Illuminate\Support\Facades\Session::has(\Illuminate\Support\Facades\Auth::id().'cart') ? \Illuminate\Support\Facades\Session::get(\Illuminate\Support\Facades\Auth::id().'cart')->totalQuantity : '' }}</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('product.index')}}">@lang('message.home')</a></li>
                    <li><a href="{{route('product.shop')}}">@lang('message.shop_page')</a></li>
                    <li><a href="{{route('product.detail',6)}}">@lang('message.single_product')</a></li>
                    <li><a href="{{route('product.cart')}}">@lang('message.cart')</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">CATEGORIES</button>
                            <div class="dropdown-content">
                                <div class="list-group">
                                    @foreach($categories as $category)
                                        <a href="{{route('product.category',$category->id)}}" class="list-group-item list-group-item-action">{{$category->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">BRANDS</button>
                            <div class="dropdown-content">
                                <div class="list-group">
                                    @foreach($brands as $brand)
                                    <a href="{{route('product.brand',$brand->id)}}" class="list-group-item list-group-item-action">{{$brand->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">@lang('message.others')</a></li>
                    <li><a href="#">@lang('message.contact')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
@yield('content')

@include('core.footer')

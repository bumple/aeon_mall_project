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
                    <a href="{{route('product.cart')}}">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i>
                        <span class="product-count">5</span></a>
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
                    <li><a href="single-product.html">@lang('message.single_product')</a></li>
                    <li><a href="{{route('product.cart')}}">@lang('message.cart')</a></li>
                    <li><a href="checkout.html">@lang('message.check_out')</a></li>
                    <li><a href="#">@lang('message.category')</a></li>
                    <li><a href="#">@lang('message.others')</a></li>
                    <li><a href="#">@lang('message.contact')</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
@yield('content')

@include('core.footer')

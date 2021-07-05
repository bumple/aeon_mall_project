<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop App</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header -->
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i
                                    class="fa fa-user"></i> @lang('message.my_account') @if(session()->has('email_user'))
                                    <strong
                                        style="color:red;text-transform: uppercase">{{' : '. $user->name}}</strong> @endif
                            </a></li>
                        <li><a href="{{route('product.cart')}}"><i class="fa fa-user"></i> @lang('message.my_card')</a></li>
                        <li><a href="checkout.html"><i class="fa fa-user"></i>@lang('message.checkout')</a></li>
                        @if(!session()->has('email_user'))
                            <li><a href="{{route('user.showFormLogin')}}"><i
                                        class="fa fa-user"></i> @lang('message.login')   </a></li>
                        @else
                            <li><a href="{{route('user.logout')}}"><i class="fa fa-user"></i> @lang('message.logout')
                                </a></li>
                        @endif
                        @if(isset($user) && $user->type == 1)
                            <li><a href="{{route('admin.index')}}"><i class="fa fa-user"></i> @lang('message.adminpage')
                                </a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                    class="key">@lang('message.currency'): </span><span class="value"> </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">VND</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                    class="key">@lang('message.language'): </span><span
                                    class="value">{{session()->get('language')}} </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('language','en')}}">English</a></li>
                                <li><a href="{{route('language','vi')}}">Viet Nam</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
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
<!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>

<!-- jQuery easing -->
<script src="{{asset('js/jquery.easing.1.3.min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('js/main.js')}}"></script>

<!-- Slider -->
<script type="text/javascript" src="{{asset('js/bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.slider.js')}}"></script>

<!-- Toastr -->
<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(\Illuminate\Support\Facades\Session::has('error'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(\Illuminate\Support\Facades\Session::has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(\Illuminate\Support\Facades\Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>

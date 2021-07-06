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

<!-- Modal-->
<!-- medium modal -->
{{--<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body" id="mediumBody">--}}
{{--                <div>--}}
{{--                    <!-- the result to be displayed apply here -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<script>--}}
{{--    // display a modal (small modal)--}}
{{--    $(document).on('click', '#smallButton', function(event) {--}}
{{--        event.preventDefault();--}}
{{--        let href = $(this).attr('data-attr');--}}
{{--        $.ajax({--}}
{{--            url: href,--}}
{{--            beforeSend: function() {--}}
{{--                $('#loader').show();--}}
{{--            },--}}
{{--            // return the result--}}
{{--            success: function(result) {--}}
{{--                $('#smallModal').modal("show");--}}
{{--                $('#smallBody').html(result).show();--}}
{{--            },--}}
{{--            complete: function() {--}}
{{--                $('#loader').hide();--}}
{{--            },--}}
{{--            error: function(jqXHR, testStatus, error) {--}}
{{--                console.log(error);--}}
{{--                alert("Page " + href + " cannot open. Error:" + error);--}}
{{--                $('#loader').hide();--}}
{{--            },--}}
{{--            timeout: 8000--}}
{{--        })--}}
{{--    });--}}

{{--    // display a modal (medium modal)--}}
{{--    $(document).on('click', '#mediumButton', function(event) {--}}
{{--        event.preventDefault();--}}
{{--        let href = $(this).attr('data-attr');--}}
{{--        $.ajax({--}}
{{--            url: href,--}}
{{--            beforeSend: function() {--}}
{{--                $('#loader').show();--}}
{{--            },--}}
{{--            // return the result--}}
{{--            success: function(result) {--}}
{{--                $('#mediumModal').modal("show");--}}
{{--                $('#mediumBody').html(result).show();--}}
{{--            },--}}
{{--            complete: function() {--}}
{{--                $('#loader').hide();--}}
{{--            },--}}
{{--            error: function(jqXHR, testStatus, error) {--}}
{{--                console.log(error);--}}
{{--                alert("Page " + href + " cannot open. Error:" + error);--}}
{{--                $('#loader').hide();--}}
{{--            },--}}
{{--            timeout: 8000--}}
{{--        })--}}
{{--    });--}}

{{--</script>--}}
<!-- End Header -->

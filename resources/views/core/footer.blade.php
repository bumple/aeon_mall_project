<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>Ai<span>Shop</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam
                        laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure
                        eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis
                        magni at?</p>
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
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your
                        inbox!</p>
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
                    <p>&copy; 2021 Since <a href="http://www.codegym.vn" target="_blank">Codegym.vn</a></p>
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
</div>

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

<script>
    let origin = window.origin;

    function reduce(id) {
        $.ajax({
            url: origin + '/product/' + id + '/reduce',
            method: 'get',
            success: function (res) {
                console.log(res)
                // $('#total-quantity').val(res.totalQuantity);
                // $('#quantity-item').val(res.items.id.quantity);
                $('.quantity-item-' + id).val(res.items[id]['quantity']);

                let result = res.items[id]['price'] * res.items[id]['quantity'];
                if (res.items[id]['quantity'] === 0) {
                    alert('Are you sure?');
                    $('.cart-item-' + id).remove();
                }
                $('.total-price-' + id).html(result);
                $('#total-amount').html(res.totalPrice);
                $('#total-quantity-cart').html(res.totalQuantity);
            },
            error: function (err) {

            }
        });
    }

    function increase(id) {
        $.ajax({
            url: origin + '/product/' + id + '/increase',
            method: 'get',
            success: function (res) {
                console.log(res);
                $('.quantity-item-' + id).val(res.items[id]['quantity']);
                // console.log(test);
                let result = res.items[id]['price'] * res.items[id]['quantity'];

                $('.total-price-' + id).html(result);
                $('#total-amount').html(res.totalPrice);
                $('#total-quantity-cart').html(res.totalQuantity);
            },
            error: function (err) {

            }
        });
    }

    function addToCart(id) {
        $.ajax({
            url: origin + '/product/add-cart/' + id,
            method: 'get',
            success: function (res) {
                console.log(res);
                $('.cart-amount').html(res.totalPrice);
                $('.product-count').html(res.totalQuantity);
            }
        });
    }

    $('.send-mail').on('click',function (e){
        $.ajax({
            url: origin + '/send-email/',
            method: 'post',

        })
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    // hien thi cac tinh
    $(window).on('load', function () {
        $.ajax({
            url: 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province',
            method: 'GET',
            headers: {
                'token': "d250e2f1-de5e-11eb-9388-d6e0030cbbb7",
                'Content-Type': 'application/json'
            },
            dataType: 'json',
            success: function (res) {
                let data  = res.data;
                let html = '<option value="">-Tỉnh thành-</option>'
                $.each(data , function (index , item){
                    // console.log(item)
                    html += '<option provinceID="'+item.ProvinceID+'" value="'+item.ProvinceName+'">'+item.ProvinceName+'</option>'
                })
                $('#province').html(html)
            },
            error: function () {
            }
        });
    });

    // hien thi quan-huyen-phuong-xa
    $(document).ready(function (){
        // hien thi quan huyen
        $('body').on('change','#province',function (){
            let provinceID = $('option:selected' , this ).attr('provinceID');
            $.ajax({
                url: 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/district',
                method: 'GET',
                headers: {
                    'token': "d250e2f1-de5e-11eb-9388-d6e0030cbbb7",
                    'Content-Type': 'application/json'
                },
                dataType: 'json',
                success: function (res) {
                    let data  = res.data;
                    let html = '<option value="">-Quận Huyện-</option>'
                    $.each(data , function (index , item){
                        if (item.ProvinceID == provinceID){
                            html += '<option districtID="'+item.DistrictID+'" value="'+item.DistrictName+'">'+item.DistrictName+'</option>'
                        }
                    })
                    $('#district').html(html)
                },
                error: function () {
                }
            })
        })
        // hien thi phuong xa
        $('body').on('change','#district',function (){
            let districtID = $('option:selected' , this).attr('districtID')
            console.log(districtID)
            $.ajax({
                url: 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=' + districtID,
                method: 'GET',
                headers: {
                    'token': "d250e2f1-de5e-11eb-9388-d6e0030cbbb7",
                    'Content-Type': 'application/json'
                },
                dataType: 'json',
                success: function (res) {
                    let data  = res.data;
                    let html = '<option value="">-Phường Xã-</option>'
                    $.each(data , function (index , item){
                        console.log(item)
                        if (item.DistrictID == districtID){
                            html += '<option value="'+item.WardName+'">'+item.WardName+'</option>'
                        }
                    })
                    $('#ward').html(html)
                },
                error: function () {
                }
            })
        })
    });
    $('.collapse').collapse()
</script>
</body>
</html>

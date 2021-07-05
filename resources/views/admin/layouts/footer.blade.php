<!-- Toastr -->
<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(\Illuminate\Support\Facades\Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(\Illuminate\Support\Facades\Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(\Illuminate\Support\Facades\Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('backend/admin/assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/admin/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/admin/assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/admin/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript"
        src="{{asset('backend/admin/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('backend/admin/assets/js/modernizr/modernizr.js')}}"></script>
<!-- am chart -->
<script src="{{asset('backend/admin/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('backend/admin/assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('backend/admin/assets/pages/todo/todo.js')}} "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('backend/admin/assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/admin/assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{asset('backend/admin/assets/js/SmoothScroll.js')}}"></script>
<script src="{{asset('backend/admin/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('backend/admin/assets/js/demo-12.js')}}"></script>
<script src="{{asset('backend/admin/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function () {
        if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        } else {
            nav.removeClass('active');
        }
    });

    let origin = window.origin;

    $('#checkall').change(function () {
        $('.cb-element').prop('checked',this.checked);
    });

    $('.cb-element').change(function () {
        if ($('.cb-element:checked').length === $('.cb-element').length){
            $('#checkall').prop('checked',true);
            console.log('checked')
        }
        else {
            $('#checkall').prop('checked',false);
            console.log('test2')
        }
    });

    $('#delete-all').click(function (){
        let id = [];
        $('.cb-element:checked').each(function (i){
           id[i] = $(this).val();
           console.log(id)
        });
        $.ajax({
            url: origin + '/admin/products/delete/all-product',
            type: 'GET',
            data: { id : id },
            success: function (res) {
                console.log(res)
                for (let i = 0; i < id.length; i++) {
                    $('.product-'+ id[i]).remove();
                }
            },

            error: function (err) {

            }
        });
    });

</script>
</body>

</html>

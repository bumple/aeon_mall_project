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
    var button = $('.delete_all')
    $(".check_all").on("click", function () {
        if (this.checked) {
            $(".custom_name").each(function () {
                $(this).prop("checked", true);
            });
        } else {
            $(".custom_name").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    let origin = window.origin;

    $('.check_all').on('click', function (e) {
        var allVals = [];
        $('.custom_name:checked').each(function () {
            allVals.push($(this).attr('data-id'));
        });
        var join_selected_values = allVals.join(",");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/admin/products/deleteAll',
            method: 'delete',
            data: "ids=" + join_selected_values,
            success: function (data) {
                console.log(response);
            }
        })
    });
</script>
</body>

</html>

</div><!-- Content Body End -->

<!-- Footer Section Start -->
<div class="footer-section">
    <div class="container-fluid">

        <div class="footer-copyright text-center">
            <p class="text-body-light"> @php date('Y') @endphp &copy; <a href="#">Admin</a></p>
        </div>

    </div>
</div><!-- Footer Section End -->

</div>

<!-- JS
============================================ -->

<!-- Global Vendor, plugins & Activation JS -->
<script src="{{url('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{url('assets/js/vendor/popper.min.js')}}"></script>
<script src="{{url('assets/js/vendor/bootstrap.min.js')}}"></script>
<!--Plugins JS-->
<script src="{{url('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('assets/js/plugins/tippy4.min.js.js')}}"></script>
<!--Main JS-->
<script src="{{url('assets/js/main.js')}}"></script>

<!-- Plugins & Activation JS For Only This Page -->

<!--Moment-->
<script src="{{url('assets/js/plugins/moment/moment.min.js')}}"></script>

<!--Daterange Picker-->
<script src="{{url('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{url('assets/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>

<!--Echarts-->
<script src="{{url('assets/js/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{url('assets/js/plugins/chartjs/chartjs.active.js')}}"></script>

<!--VMap-->
<script src="{{url('assets/js/plugins/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('assets/js/plugins/vmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{url('assets/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js')}}"></script>
<script src="{{url('assets/js/plugins/vmap/vmap.active.js')}}"></script>

<script>
    $(document).ready(function() {
        $(".alert").hide(300);

        $('.side-header-menu ul li').on('click', function() {
            $('.side-header-menu ul li.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
</body>

</html>
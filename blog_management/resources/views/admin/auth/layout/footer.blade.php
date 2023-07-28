
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('admin/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('admin/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('admin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('admin/js/main.js')}}"></script>
    <script src="{{asset('admin/js/ui-toasts.js')}}"></script>
    <script src="{{asset('admin/js/sweetalert.mis.js')}}"></script>
    {{--  <script src="{{asset('admin/js/sweetalert2.all.min.js')}}"></script>  --}}
    <script>
    @if(Session::has('success'))
    swal({
    title: "Nice!",
    text: "{{ Session::get('success') }}",
    icon: "success",
    timer: 3000
    });
    @elseif(Session::has('warning'))
    swal({
    title: "OOPsy!",
    text: "{{ Session::get('warning') }}",
    icon: "warning",
    timer: 3000
    });
    @elseif(Session::has('danger'))
    swal({
    title: "Ohh!! No!!",
    text: "{{ Session::get('danger') }}",
    icon: "error",
    timer: 3000
    });
    @endif
    </script>
</body>

</html>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="https://abhimanyuarora.online">Abhimanyu Arora</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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
    <script src="{{asset('admin/js/sweetalert.mis.js')}}"></script>
    <script>
    @if(Session::has('success'))
    swal({
    title: "Good job!",
    text: "{{ Session::get('success') }}",
    icon: "success",
    timer: 1500
    });
    @elseif(Session::has('warning'))
    swal({
    title: "OOPsy!",
    text: "{{ Session::get('warning') }}",
    icon: "warning",
    timer: 1500
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
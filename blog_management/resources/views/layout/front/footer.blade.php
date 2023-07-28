<!-- Footer Section -->
	<footer class="footer__section">
		<div class="container">
			<div class="footer__copyright__text">
				<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This Blog Page is made by <i class="fa fa-user" aria-hidden="true"></i> by <a href="https://abhimanyuarora.online" target="_blank">Abhimanyu Arora</a></p>
			</div>
		</div>
	</footer>
	<!-- Footer Section end -->

	<!-- Search Begin -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search End -->

	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js/vendor/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('js/slick.min.js')}}"></script>
	<script src="{{asset('js/fresco.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<script src="{{asset('admin/js/sweetalert.mis.js')}}"></script>
    <script>
    @if(Session::has('success'))
    swal({
    title: "Good job!",
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

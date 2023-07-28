<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog Management</title>
	<meta charset="UTF-8">
	<meta name="description" content="Blog Management">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/fresco.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/slick.css')}}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-md-3 order-2 order-sm-1">
					<div class="header__social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
					<a href="{{url('/')}}" class="site-logo">
						<img src="{{asset('img/logo.png')}}" alt="">
					</a>
				</div>
				<div class="col-sm-4 col-md-3 order-3 order-sm-3">
					<div class="header__switches">
						<a href="{{url('admin/signin')}}" target="_blank" @if(!empty(Session::get('name'))) title="{{Session::get('name')}} Admin Panel" @else title="Sign-In" @endif><i class="fa fa-user"></i></a>
					</div>
				</div>
			</div>
			<nav class="main__menu">
				<ul class="nav__menu">
					<li><a href="{{url('/')}}" class="{{ request()->is('/') ? 'menu--active' : '' }}">Home</a></li>
					<li><a href="{{route('blogs')}}" class="{{ request()->is('blogs') ? 'menu--active' : (request()->is('blog_detail/*') ? 'menu--active' :'') }}">Blog</a></li>
					<li><a href="" class="{{ request()->is('/') ? 'menu--active' : '' }}">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header Section end -->


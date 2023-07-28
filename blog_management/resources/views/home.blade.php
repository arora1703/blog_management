@include('layout.front.header')
	<!-- Hero Section -->
	<section class="hero__section">
		<div class="hero-slider">
			@foreach($blog_data as $key => $data)
            <div class="slide-item">
				<a class="fresco" href="{{asset('uploads/header_images/'.$data->blog_header_image)}}" data-fresco-group="projects">
					<img src="{{asset('uploads/header_images/'.$data->blog_header_image)}}" alt="">
				</a>	
			</div>
            @endforeach
		</div>
		<div class="hero-text-slider">
			@foreach($blog_data as $key => $data)
            <div class="text-item">
				<h2>{{$data->category->category_name}}</h2>
				<p>{{$data->user->name}}</p>
			</div>
            @endforeach
			
		</div>
	</section>
	<!-- Hero Section end -->
@include('layout.front.footer')

	
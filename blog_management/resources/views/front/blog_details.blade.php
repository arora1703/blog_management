@include('layout.front.header')
<!-- Blog Page -->
    <input type="hidden" id="blog_id" value="{{$blog_data->blog_id}}">
    <input type="hidden" id="user_id" value="{{Session::get('user_id')}}">
    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
	<div class="blog__single__page">
		<div class="blog__slider">
		@if(($blog_data['blogimage']->isEmpty()))
			<div class="blog__slider__item">
				<img src="{{asset('img/blog-single/1.jpg')}}" alt="">
			</div>
			<div class="blog__slider__item">
				<img src="{{asset('img/blog-single/2.jpg')}}" alt="">
			</div>
			<div class="blog__slider__item">
				<img src="{{asset('img/blog-single/3.jpg')}}" alt="">
			</div>
		@else
			@foreach($blog_data['blogimage'] as $image)
				<div class="blog__slider__item">
					<img src="{{asset('uploads/blog_images').'/'.$image->image_deatils}}" width="580" height="350" alt="">
				</div>
			@endforeach
		@endif
		</div>
		<article class="blog__article">
			<div class="blog__container">
				<div class="blog__header">
					<div class="blog__cata">{{$blog_data->category->category_name}}</div>
					<h2 class="blog__single__title">{{$blog_data->blog_title}}</h2>
					<div class="blog__metas">
						<div class="blog__meta">By {{$blog_data->user->name}} </div>
						<div class="blog__meta">{{ date('F d, Y', strtotime($blog_data->created_at)) }}</div>
						<div class="blog__meta">No Comments</div>
					</div>
				</div>
				<p>As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity. </p>
				<p>Sussex result matter any end see. It speedily me addition weddings vicinity in pleasure. Happiness commanded an conveying breakfast in. Regard her say warmly elinor. Him these are visit front end for seven walls. Money eat scale now ask law learn. Side its they just any upon see last. He prepared no shutters perceive do greatest. Ye at unpleasant solicitude in companions interested. </p>
			</div>
			<blockquote>
				<p>Sed dignissim justo. Suspendisse fermentum erat. Duis consequat tortor. Mauris ut tellus a dolor. Suspendisse nec tellus. Donec quis lacus magna, sollicitudin id, turpis. Mauris in velit vel sollicitudin justo. Proin vitae massa nec cursus magna. Fusce blandit eu, ullamcorper in.</p>
				<h4>Marvin Barber</h4>
				<h5>PHOTOGRAPHY</h5>
			</blockquote>
			<div class="blog__container">
				<h4>Assorted Textures FREE Stock Photos</h4>
				<p>As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity. </p>
				<p>Sussex result matter any end see. It speedily me addition weddings vicinity in pleasure. Happiness commanded an conveying breakfast in. Regard her say warmly elinor. Him these are visit front end for seven walls. Money eat scale now ask law learn. Side its they just any upon see last. He prepared no shutters perceive do greatest. Ye at unpleasant solicitude in companions interested. </p>
			</div>
			<div class="blog__banner pt-4 pb-5">
				<img src="{{asset('img/blog-single/banner.jpg')}}" alt="">
			</div>
			<div class="blog__container">
				<h4>Assorted Textures FREE Stock Photos</h4>
				<p>As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity. </p>
				<p>Sussex result matter any end see. It speedily me addition weddings vicinity in pleasure. Happiness commanded an conveying breakfast in. Regard her say warmly elinor. Him these are visit front end for seven walls. Money eat scale now ask law learn. Side its they just any upon see last. He prepared no shutters perceive do greatest. Ye at unpleasant solicitude in companions interested. </p>
			</div>
			<div class="blog__container post__footer">
				<div class="row">
					<div class="col-md-6">
						<div class="post__tags">
                            <a title="Like" class="like 
									@foreach($blog_data->likestatus as $likestatus)
									@if(($likestatus->like_status==1)&&($likestatus->user_id==Session::get('user_id')))
									{{__('active')}}
									@endif
									@endforeach" ><i class="fa fa-thumbs-up"></i></a>
                            <a class="dislike 
									@foreach($blog_data->likestatus as $likestatus)
									@if(($likestatus->like_status==0)&&($likestatus->user_id==Session::get('user_id')))
									{{__('active')}}
									@endif
									@endforeach" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
							<a href="#">Camera</a>
							<a href="#">Photography</a>
							<a href="#">Tips</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="post__share">
							<span>Share:</span>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-youtube-play"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="blog__container comment__area">
				<h2>Leave a Comment</h2>
				<form action="{{route('submit-comment')}}" method="post" class="comment__form">
				@csrf
				<input type="hidden" name="blog_id" value="{{$blog_data->blog_id}}">
					<div class="row">
						<div class="col-lg-6 ms-3">
							<input type="text" class="form-control @error('name') mb-2  is-invalid @enderror" placeholder="Name" name="name" value={{old('name')}}>
							@error('name')
							<span style="color:red;">{{ $message }}</span>
							@enderror
						</div>
						<div class="col-lg-6 ms-3">
							<input type="email" placeholder="Email" class="form-control @error('email') mb-2 is-invalid @enderror" name="email" value={{old('email')}}>
							@error('email')
							<span style="color:red;">{{ $message }}</span>
							@enderror
						</div>
						<div class="col-lg-12 ms-3">
							<textarea placeholder="Message" class="form-control @error('comment_description') mb-2  is-invalid @enderror" name="comment_description">{{old('comment_description')}}</textarea>
							@error('comment_description')
							<span style="color:red;">{{ $message }}</span>
							@enderror
							<button type="submit" name="submit" value="submit" class="site-btn">Send Message</button>
						</div>
					</div>
				</form>
			</div>
			<div class="container recent__post">
				<div class="text-center">
					<h2>You may also like</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="blog__item set-bg" data-setbg="{{asset('img/blog/4.jpg')}}">
							<div class="blog__content">
								<div class="blog__date">DEC 18, 2019</div>
								<h4><a href="{{route('blogs')}}">Assorted Textures FREE Stock Photos</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="blog__item set-bg" data-setbg="{{asset('img/blog/2.jpg')}}">
							<div class="blog__content">
								<div class="blog__date">DEC 18, 2019</div>
								<h4><a href="{{route('blogs')}}">Assorted Textures FREE Stock Photos</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="blog__item set-bg" data-setbg="{{asset('img/blog/3.jpg')}}">
							<div class="blog__content">
								<div class="blog__date">DEC 18, 2019</div>
								<h4><a href="{{route('blogs')}}">Assorted Textures FREE Stock Photos</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
	<!-- Blog Page end -->
@include('layout.front.footer')

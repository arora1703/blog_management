@include('layout.front.header')

<!-- Blog Page -->
	<section class="blog__page">
		<div class="blog__warp">
			<div class="row blog__grid text-white">
				<div class="col-lg-8 col-xl-9">
					<div class="row">
                        @if(!empty($blog_data[0]))
						<div class="col-md-8 col-lg-7 col-xl-8">
							<div class="blog__item set-bg" data-setbg="{{asset('uploads/header_images/'.$blog_data[0]->blog_header_image)}}">
								<div class="blog__content">
									<div class="blog__date">{{ date('d-F-Y', strtotime($blog_data[0]->created_at)) }}</div>
									<h3><a href="{{url('blog_detail').'/'.$blog_data[0]->blog_id}}">{{$blog_data[0]->blog_title}}</a></h3>
									<h6>By {{$blog_data[0]->user->name}}</h6>
								</div>
							</div>
						</div>
                        @endif
                        @if(!empty($blog_data[1]))
						<div class="col-md-4 col-lg-5 col-xl-4">
							<div class="blog__item set-bg" data-setbg="{{asset('uploads/header_images/'.$blog_data[1]->blog_header_image)}}">
								<div class="blog__content">
									<div class="blog__date">{{ date('d-F-Y', strtotime($blog_data[1]->created_at)) }}</div>
									<h4><a href="{{url('blog_detail').'/'.$blog_data[1]->blog_id}}">{{$blog_data[1]->blog_title}}</a></h4>
                                    <h6>By {{$blog_data[1]->user->name}}</h6>
								</div>
							</div>
						</div>
                        @endif
                        @if(!empty($blog_data[2]))
						<div class="col-md-4 col-lg-5 col-xl-4">
							<div class="blog__item set-bg" data-setbg="{{asset('uploads/header_images/'.$blog_data[2]->blog_header_image)}}">
								<div class="blog__content">
									<div class="blog__date">{{ date('d-F-Y', strtotime($blog_data[2]->created_at)) }}</div>
									<h4><a href="{{url('blog_detail').'/'.$blog_data[2]->blog_id}}">{{$blog_data[2]->blog_title}}</a></h4>
                                    <h6>By {{$blog_data[2]->user->name}}</h6>
								</div>
							</div>
						</div>
                        @endif
                        @if(!empty($blog_data[4]))
						<div class="col-md-8 col-lg-7 col-xl-8">
							<div class="blog__item set-bg" data-setbg="{{asset('uploads/header_images/'.$blog_data[4]->blog_header_image)}}">
								<div class="blog__content">
									<div class="blog__date">{{ date('d-F-Y', strtotime($blog_data[4]->created_at)) }}</div>
									<h3><a href="{{url('blog_detail').'/'.$blog_data[4]->blog_id}}">{{$blog_data[4]->blog_title}}</a></h3>
                                    <h6>By {{$blog_data[4]->user->name}}</h6>
								</div>
							</div>
						</div>
                        @endif
					</div>
				</div>
                @if(!empty($blog_data[3]))
				<div class="col-lg-4 col-xl-3">
					<div class="blog__item blog__item--long set-bg" data-setbg="{{asset('uploads/header_images/'.$blog_data[3]->blog_header_image)}}">
						<div class="blog__content">
							<div class="blog__date">{{ date('d-F-Y', strtotime($blog_data[3]->created_at)) }}</div>
							<h4><a href="{{url('blog_detail').'/'.$blog_data[3]->blog_id}}">{{$blog_data[3]->blog_title}}</a></h4>
                            <h6>By {{$blog_data[3]->user->name}}</h6>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</section>
	<!-- Blog Page end -->
@include('layout.front.footer')

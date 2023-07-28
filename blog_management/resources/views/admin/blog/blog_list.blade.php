@include('layout.admin.header')
          <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="{{route('add-blog')}}"  style="float: right;">Add New</a>
                            <h6 class="mb-4">Blog Details</h6>
                            
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Blog Title</th>
                                            <th scope="col">Blog Category</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Blog Image</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($blogdata->isNotEmpty())
                                        @foreach($blogdata as $key => $value)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{!! Str::words($value->blog_title, 3, ' ...') !!}</td>
                                                <td>{{$value->category->category_name}}</td>
                                                <td>{!! Str::words($value->description, 6, ' ...') !!}</td>
                                                <td><img src="{{asset('uploads/header_images/'.$value->blog_header_image)}}" height="30" width="60"></td>
                                                <td>{{$value->user->name}}</td>
                                                <td>{{$value->status==1?'Published':'Pending'}}</td>
                                                <td class="text-center">
                                                    @if($value->user->id==session()->get('user_id'))
                                                    <a href="{{url('blog_detail').'/'.$value->blog_id}}" class="btn btn-info" title="View"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('admin/edit_blog').'/'.$value->blog_id}}" class="btn btn-warning" title="Edit"><i class="fa fa-pen-nib"></i></a>
                                                    <a href="{{url('admin/delete_blog').'/'.$value->blog_id}}" class="btn btn-primary" title="Delete"><i class="fa fa-eraser"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else  
                                            <tr>
                                               <td colspan="8" class="text-center">No Blog Details Available</td>
                                            </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

@include('layout.admin.footer')
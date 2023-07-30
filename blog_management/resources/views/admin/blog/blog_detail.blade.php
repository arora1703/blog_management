@include('layout.admin.header')
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Blog Entry Form</h6>
                            <form action="{{route('search-blog')}}" method="post">
                            @csrf
                                <div class="col-md-12 d-flex ">
                                    <div class="col">
                                        <label for="blog_title" class="form-label">Blog Title</label>
                                        <input type="text" class="form-control" name="blog_title" value="{{old('blog_title')}}" id="blog_title"
                                        aria-describedby="blog_title">
                                    </div>
                                    <div class="col ms-2">
                                        <label for="user" class="form-label">Authors</label>
                                        <select class="form-select mb-3" name="user_id" aria-label="user">
                                            <option value="">Open this select Author</option>
                                            @foreach($user as $key => $user)
                                                <option value="{{$user->id}}" @selected(old('user_id') == $user->id)>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col ms-2">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-select mb-3 " name="category_id" aria-label="category">
                                            <option value="">Open this select category</option>
                                            @foreach($category as $key => $category)
                                                <option value="{{$category->category_id}}" @selected(old('category_id') == $category->category_id)>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="search" value="search" class="btn btn-primary">Search</button>
                                <button type="submit" name="search" value="reset" class="btn btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                                                    <a href="{{url('blog_detail').'/'.$value->blog_id}}" class="btn btn-info" target="_blank"title="View"><i class="fa fa-eye"></i></a>
                                                    @if($value->user->id==session()->get('user_id'))
                                                    <a href="{{url('admin/edit_blog').'/'.$value->blog_id}}" class="btn btn-warning" title="Edit"><i class="fa fa-pen-nib"></i></a>
                                                    <a href="{{url('admin/delete_blog').'/'.$value->blog_id}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this blog?');" title="Delete"><i class="fa fa-eraser"></i></a>
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
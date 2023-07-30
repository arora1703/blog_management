@include('layout.admin.header')
          <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Blog Search Filters</h6>
                            <form action="searchblog" method="post">
                            @csrf
                                <div class="col-md-12 d-flex mb-3">
                                    <div class="col ">
                                        <label for="blog_title" class="form-label">Blog Title</label>
                                        <input type="text" class="form-control @error('blog_title') is-invalid @enderror" name="blog_title" value="{{old('blog_title')}}" id="blog_title"
                                        aria-describedby="blog_title">
                                        @error('blog_title')
                                        <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;">{{old('description')}}</textarea>
                                    <label for="floatingTextarea">Blog Content</label>
                                    @error('description')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 d-flex mb-3">
                                    <div class="col">
                                        <label for="formFile" class="form-label @error('description') is-invalid @enderror">Blog Header Image</label>
                                        <input class="form-control bg-dark" name="blog_header_image" type="file" id="formFile">
                                        @error('blog_header_image')
                                        <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col ms-3">
                                        <label for="formFile" class="form-check">Is Publish?</label>
                                        <div class="form-check form-check-inline form-check-margin">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                            value="1" checked>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                            value="0">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Blog Related Images(Multiples Allowed)</label>
                                    <input class="form-control bg-dark  @error('images.*') is-invalid @enderror" type="file" name="images[]" id="formFileMultiple" multiple>
                                    @error('images.*')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
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
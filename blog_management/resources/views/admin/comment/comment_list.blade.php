@include('layout.admin.header')
          <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Comment Details</h6>
                            
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Blog Title</th>
                                            <th scope="col">Blog Category</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Comment Description</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($comment_data->isNotEmpty())
                                            @foreach($comment_data as $key => $data)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->blog_title}}</td>
                                                    <td>{{$data->category_name}}</td>
                                                    <td>{{$data->author}}</td>
                                                    <td>{{$data->comment_description}}</td>
                                                    <td class="text-center">
                                                    @if($data->id==session()->get('user_id'))
                                                    <a href="{{url('admin/delete_comment').'/'.$data->comment_id}}" onclick="return confirm('Are you sure you want to delete this comment?');" class="btn btn-primary" title="Delete"><i class="fa fa-eraser"></i></a>
                                                    @endif
                                                </td>
                                                </tr>
                                                
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" class="text-center">Waiting for the data</td>
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
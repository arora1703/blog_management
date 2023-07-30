@include('layout.admin.header')
          <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="{{route('add-category')}}"  style="float: right;">Add New</a>
                            <h6 class="mb-4">Category Details</h6>
                            
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($category->isNotEmpty())
                                        @foreach($category as $key => $value)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$value->category_name}}</td>
                                                <td>{{$value->status==1?'Active':'In-Active'}}</td>
                                            </tr>
                                        @endforeach
                                    @else  
                                            <tr>
                                               <td colspan="3" class="text-center">No category Details Available</td>
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
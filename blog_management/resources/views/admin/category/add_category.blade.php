@include('layout.admin.header')

<!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Category Entry Form</h6>
                            <form action="addcategory" method="post">
                            @csrf
                                <div class="col-md-12 mb-3">
                                        <label for="category_name" class="form-label">Category Title</label>
                                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{old('category_name')}}" id="category_name"
                                        aria-describedby="category_name">
                                        @error('category_name')
                                        <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
@include('layout.admin.footer')
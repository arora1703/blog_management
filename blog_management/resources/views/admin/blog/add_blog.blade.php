@include('layout.admin.header')

<!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Blog Entry Form</h6>
                            <form action="addblog" method="post" enctype="multipart/form-data">
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
                                    <div class="col ms-3">
                                        <label for="exampleInputPassword1" class="form-label">Category</label>
                                        <select class="form-select mb-3 @error('category_id') is-invalid @enderror" name="category_id" aria-label="example">
                                            <option value="">Open this select category</option>
                                            @foreach($category as $key => $category)
                                                <option value="{{$category->category_id}}" @selected(old('category_id') == $category->category_id)>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
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
            </div>
            <!-- Form End -->












@include('layout.admin.footer')
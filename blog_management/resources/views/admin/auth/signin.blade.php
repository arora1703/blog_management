@include('admin.auth.layout.header')
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{route('login')}}" class="">
                                <h3 class="text-primary"></i>Blog Management</h3>
                            </a>
                            <h3>Sing In</h3>
                        </div>
                        <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('email_username') is-invalid @enderror" id="floatingInput" name="email_username" value="{{old('email_username')}}"  placeholder="name@example.com">
                            <label for="floatingInput">Email address/Username</label>
                            @error('email_username')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="{{url('admin/signup')}}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
@include('admin.auth.layout.footer')

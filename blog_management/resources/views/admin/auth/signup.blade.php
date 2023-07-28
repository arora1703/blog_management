@include('admin.auth.layout.header')
        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{url('admin/signup')}}" class="">
                                <h3 class="text-primary">Blog Management</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form action="{{route('register-user')}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingText" name="name" value="{{old('name')}}" placeholder="jhondoe">
                                <label for="floatingText">Name</label>
                                @error('name')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingText" name="username" value="{{old('username')}}" placeholder="jhondoe">
                                <label for="floatingText">Username</label>
                                @error('username')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{old('email')}}" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" name="submit" value="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        </form>
                        <p class="text-center mb-0">Already have an Account? <a href="{{route('login')}}">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
@include('admin.auth.layout.footer')

@extends('layout.authbase')
@section("custom_css")

@stop



@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-4 bg-white">
            <div class=" m-h-100">
                <div class="account-pages ">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 pl-5 pr-5">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ url('/') }}">
                                                <img class="img-fluid" src="{{ ('/frontend/assets/img/alstomfx-logo.png') }}" alt="" style="height: 250px;" /> </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                                        <p class="text-muted mt-1 mb-4">Enter your email and password to
                                            access your dashboard</p>

                              

                                        <form action="#" class="authentication-form" method="POST" >
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="email" id="email" name="" class="form-control" placeholder="Enter your Email" required>
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Password</label>
                                            <a href="{{route('password')}}" class="float-right text-muted text-unline-dashed ml-1">Forgot
                                                    your
                                                    password?</a>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                                    <label class="custom-control-label" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <a href="admin/dashboard" class="btn btn_purple btn-block"> Log In
                                                </a>
                                            </div>
                                        </form>
                                       
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Dont have an account <a href="register" class="text-purple font-weight-bold ml-1">Sign
                                        Up</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                    <!-- end row -->
                    <!-- end container -->
                </div>
                <!-- end page -->


            </div>
        </div>
        <div class="col-lg-8 d-none d-md-block bg-cover" style="background-image: url(/backend/assets/images/secret.jpg);">
        </div>
    </div>
</div>

@endsection


@section("javascript")



@stop

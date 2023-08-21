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
                                                <img class="img-fluid" src="{{ ('/frontend/assets/img/alstomfx-logo.png') }}" alt="" style="height:200px;" /> </a>
                                        </div>
                                        <h3 class="h3 mb-0 mt-4 text-center text-dark">Sign Up</h3>
                                        <br>

                                        <form action="#" class="authentication-form" method="POST" >
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">First Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="text" id="" name="" class="form-control" placeholder="First Name" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label">Last Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="text" id="" name="" class="form-control" placeholder="Last Name" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label">Phone Number </label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="tel" id="" name="" class="form-control" placeholder="Phone Number" required>
                                                </div>
                                            </div>

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
                                                
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Confirm Password</label>
                                                
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Confirm your password" required>
                                                </div>
                                            </div>


                                            <div class="form-group mb-0 text-center">
                                                <a href="admin/dashboard" class="btn btn_purple btn-block"> Sign Up
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
                                <p class="text-muted">Back to <a href="{{ route('login') }}"
                                        class="text-purple font-weight-bold ml-1">Login</a>
                                </p>
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

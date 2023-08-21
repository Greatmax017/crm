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
                                        <h6 class="h5 mb-0 mt-4">Reset Password</h6>
                                        

                                        <form action="#" class="authentication-form" method="POST" >
                                            @csrf

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">New Password</label>
                                                
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
                                                <a href="#" class="btn btn_purple btn-block"> Reset Password
                                                </a>
                                            </div>
                                        </form>
                                       
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

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

@extends('layouts.app')
@if(Auth::user())
  <script>window.location = "/dashboard";</script>

@endif
@section('content')





        <!-- uiView: -->
        <div ui-view="" style="height: 100vh;" class="ng-scope"><div class="home-center ng-scope">
    <div class="home-desc-center">

        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 py-3">


                                <div class="text-center">
                                    <a href="app.neptunefx.net">
                                        <img src="/imgs/logo.svg" height="45" alt="logo">
                                    </a>

                                    <h5 class="text-primary mb-2 mt-4 ng-binding">Welcome Back !</h5>
                                    <p class="text-muted ng-binding">Sign in to continue to Neptune.</p>
                                </div>




                                @if (session('error-status'))
                                <center>
                                <div class="btn btn-danger">

                                 
                                  <b>Error: &nbsp </b> {{ session('error-status') }}
                                </div>
                            </div>
                            </center>
                                @endif

                                @if (session('success-status'))
                                <center>
                                <div class="btn btn-success">

                                   
                                  {{ session('success-status') }}
                                </div>
                                </center>
                            </div>
                        @endif





                                <form class="form-horizontal mt-4 pt-2 " role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <strong>{{ $errors->first('email') }}</strong>
                                <strong>{{ $errors->first('password') }}</strong>
                                    <div class="mb-3">
                                        <label for="username" class="ng-binding">Email</label>
                                        <input type="text" class="form-control ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched" id="Username" name="email" value="{{ old('email') }}"  placeholder="Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="ng-binding">Password</label>
                                        <input type="password" class="form-control ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched" id="Password" name="password"  placeholder="Password" required>
                                    </div>


                                    <div>
                                        <button class="btn btn-primary w-100 waves-effect waves-light ng-binding" type="submit">
                                            Log In
                                        </button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="{{ url('/password/reset') }}" class="text-muted ng-binding"><i class="mdi mdi-lock me-1"></i>Forgot password? Click Here</a>
                                    </div>


                                </form>


                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center text-white">
                        <p class="ng-binding">No account yet?<a href="{{ url('/register') }}" class="fw-bold text-white ng-binding"> Register Now</a> </p>

                        <p>
                            ©
                            <script>document.write(new Date().getFullYear())</script> Neptune. Crafted with <i class="mdi mdi-heart text-danger"></i> by Neptune
                        </p>
                    </div>
                </div>
            </div>

        </div>


    </div>
   
</div>


</div>
        
        
@endsection

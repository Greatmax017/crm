@extends('layout.base')

@section("custom_css")

    <style>
        .line-head {
            border-bottom: solid 1px #dddddd;
            margin-top: 0 !important;
            margin-bottom: 15px;
        }
        .screen:not(.active) {
            visibility: hidden !important;
            opacity: 0;
            width: 0;
            padding: 0;
            height: 0;
            overflow: hidden;
            transition: opacity .3s ease-in-out;
        }
        .screen.active {
            opacity: 1;
            transition: opacity .3s ease-in-out;
        }
        .profile-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

@stop

@section('content')

    <div class="account-pages my-5">
        <div class="container-fluid">
            <div class="row-justify-content-center">
                <div class="h2"><i class="fa fa-plus"></i> Deposit</div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="card p-3">
                            <div class="content pt-3">
                                <div id="edit-profile" class="screen hash-candidate active">
                                    <form method="POST"  action="#" class="profile-form">
                                        @csrf
                                        <div class="row mb-12" style="width: 100%;">
                                            <div class="col-md-8 offset-2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>First Name</label>
                                                        <input class="form-control" type="text" name="first_name" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Last Name</label>
                                                        <input class="form-control" type="text" name="last_name" placeholder="Last name">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Email</label>
                                                        <input class="form-control" type="text" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Phone Number</label>
                                                        <input class="form-control" type="text" name="phone_number" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div><br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row mb-12">
                                            <div class="col-md-12">
                                                <button class="btn btn_purple" type="submit"><i class="fa fa-fw fa-lg fa-plus"></i>Deposit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection 

@section("javascript")

@stop
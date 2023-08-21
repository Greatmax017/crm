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
        /* nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: #495057;
            background-color: #FFF;
            border-color: #dee2e6 #dee2e6 #FFF;
        } */
/*
        .nav-tabs li a.active {
            border-left: 5px solid #5369f8 !important;
            border-bottom: none !important;
        } */
    </style>

@stop

@section('content')

    <div class="account-pages my-5">
        <div class="container-fluid">
            <div class="row-justify-content-center">
                <div class="h2"><i data-feather="file-text" class="icon-dual"></i> Settings Page</div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h4 class="line-head h5 pb-2">Personal Data</h4>
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="/backend/assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu"/>
                                    </div>
                                    <div class="col-9 pt-1" style="margin-left: -25px;padding-left: 0;">
                                        <p class="mb-1">
                                            <b>
                                                Fathia Maryam
                                            </b>
                                        </p>
                                        <p class="my-0">
                                            fafti@gmail.com
                                        </p>
                                        <p class="my-0 text-success">
                                            Active
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card p-3">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link hash-candidate active edit-profile" href="#edit-profile">Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link hash-candidate change-password" href="#change-password">Change Password</a>
                                    </li>
                                </ul>
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
                                                    <input type="text" value="profile_update" name="control" hidden>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row mb-12">
                                                <div class="col-md-12">
                                                    <button class="btn btn_purple" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="change-password" class="hash-candidate screen">
                                        <form action="#" method="POST" onSubmit="return checkPassword(this)">
                                            {{ csrf_field() }}
                                            <div class="col-8 offset-2">

                                            <label class=" control-label">Current Password</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class=" fa fa-lock"></i></span></div>
                                                    <input class="form-control" name="current_password" type="password" required>
                                                </div>
                                            </div>
                                            <label class="control-label">New Password</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class=" fa fa-lock"></i></span></div>
                                                    <input id="password" class="form-control" name="new_password" type="password" required minlength="6">
                                                </div>
                                            </div>
                                            <label class="control-label">Confirm New Password</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class=" fa fa-lock"></i></span></div>
                                                    <input id="passwordr" class="form-control" name="new_password_confirmation" type="password" required minlength="6">
                                                </div>
                                                <div class="invalid-feedback">
                                                    New Password and confirm new password must be the same
                                                </div>
                                            </div>
                                        
                                            <div class="d-flex justify-content-center">
                                            <button class="btn btn_purple" type="submit">Update Password</button>
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
<script>
    var navigation = () => {
    var locationHash = window.location.hash || "#edit-profile";
    $(".hash-candidate").removeClass("active");
    $(locationHash).addClass("active");
    if (locationHash === "#change-password") {
        $(".change-password").addClass("active");
    } else {
        $(".edit-profile").addClass("active");
    }
    };
    window.onhashchange = navigation;
    navigation();

</script>

@stop

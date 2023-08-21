@extends('layouts.app')

@section('content')
@include('sections/sidemenu')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content ng-scope">
    <!-- uiView: --><div ui-view="" class="page-content ng-scope">
<div class="page-title-box ng-scope">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>Dashboard</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Neptune</a></li>
                        <li class="breadcrumb-item active ng-binding">Account settings</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- ngIf: Nomt4!='nomts' --><div ng-if="Nomt4!=&#39;nomts&#39;" class="float-end d-sm-block ng-scope">
                    <!--<a href="javascript:;" ng-click="" class="btn btn-info ng-binding">Reset MT4 Password</a>-->
                    <a href="/bankdeposit" class="btn btn-success ng-binding">Deposit</a>
                    <a href="/ApplyWithdrawals" class="btn btn-secondary ng-binding">Withdraw</a>
                </div><!-- end ngIf: Nomt4!='nomts' -->
                <!-- ngIf: Nomt4 == 'nomts' -->

            </div>
        </div>
    </div>
</div>


<div class="container-fluid ng-scope">

    <div class="page-content-wrapper">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title ng-binding">Account settings</h4>

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="#" role="tab" ng-click="switchs(&#39;login&#39;)" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Link Demo to Real Server</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#" role="tab" ng-click="switchs(&#39;mt4&#39;)" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block ng-binding">CRM account password</span>
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home-1" role="tabpanel">
                            
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
                            <div class="table-responsive">
                                <!-- ngIf: changType=='login' -->
                                <form action="/linkmt" valid="" method="POST" id="form" class="ng-pristine ng-scope ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" novalidate="novalidate">
                                    @csrf

                                    <div class="mt-3">
                                        <label class="ng-binding">MT4 Login </label>
                                        <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength" required="" minlength="6" data-msg-minlength=" Password length no less than 6 characters" data-msg-required="This field is required" type="text"  autocomplete="off" name="mt4" aria-required="true">
                                    </div>
                                    <div class="mt-3">
                                        <label class="ng-binding">Password</label>
                                        <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" data-rule-pass="true" data-msg-pass="Must contain numbers and letters" id="mt4password" required="" minlength="6" maxlength="20" data-msg-maxlength=" Password length is not more than 20 characters " data-msg-minlength=" Password length no less than 6 characters" data-msg-required="This field is required" type="password" autocomplete="off" name="mt4password" aria-required="true">
                                    </div>
                                    <!--<div class="mt-3">-->
                                    <!--    <label class="fm-label ng-binding">Confirm Password</label>-->
                                    <!--    <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" data-rule-pass="true" data-msg-pass="Must contain numbers and letters" equalto="#pass" maxlength="20" data-msg-maxlength=" Password length is not more than 20 characters " data-msg-equalto=" The two password input is inconsistent" required="" minlength="6" data-msg-minlength=" Password length no less than 6 characters" data-msg-required="This field is required" type="password" ng-model="password.SurePassword" autocomplete="off" name="surepassword" aria-required="true">-->
                                    <!--</div>-->
                                    <div class="mt-3">
                                        <input type="submit" ng-click="change()" class="btn btn-success" value="Submit">
                                    </div>
                                </form><!-- end ngIf: changType=='login' -->
                            </div>
                        </div>
                        <div class="tab-pane" id="profile-1" role="tabpanel">
                            <div class="table-responsive">
                                <!-- ngIf: changType!='login' -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div></div>
@endsection


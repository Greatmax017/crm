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
                        <li class="breadcrumb-item active ng-binding">Deposit &amp; Withdraw</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- ngIf: Nomt4!='nomts' --><div ng-if="Nomt4!=&#39;nomts&#39;" class="float-end d-sm-block ng-scope">
                    <a href="https://crm.neptunefx.com.au/#/center/manage/BankDeposit" class="btn btn-success ng-binding">Deposit</a>
                    <a href="https://crm.neptunefx.com.au/#/center/manage/ApplyWithdrawals" class="btn btn-secondary ng-binding">Withdraw</a>
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

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="/bankdeposit" role="tab" ui-sref-active="active" ui-sref="center.manage.BankDeposit">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link"  href="/ApplyWithdrawals" role="tab" ui-sref-active="active" ui-sref="center.manage.ApplyWithdrawals">
                                <span class="d-block d-sm-none"><i class="fas fa-piggy-bank"></i></span>
                                <span class="d-none d-sm-block ng-binding">Apply For Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link"  href="/withrecord" role="tab" ui-sref-active="active" ui-sref="center.manage.RefundRecords">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Withdraw Records</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link " data-bs-toggle="tab" href="/records" role="tab" ui-sref-active="active" ui-sref="center.manage.PaymentRecords">
                                <span class="d-block d-sm-none"><i class="fas fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit  Records</span>
                            </a>
                        </li>
                    </ul>

                   <!-- uiView: --><div ui-view="" class="tab-content ng-scope"><!--入金记录-->
<section add-class="" class="slice bg-3 animate-hover-slide ng-scope">
    <div class="w-section wi100 blog-grid">
        <div class="w-section">
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
            <div class="row">
                <div class="col-md-12" style="overflow: auto;">
                    <h5 class="mt-3 font-size-24 ng-binding" style="color: rgb(205, 137, 54);">Payment Details</h5>

                                {{-- <button class="btn btn-primary">nab</button> --}}
                                <strong><h5 class="mt-3 font-size-16 ng-binding">Please transfer money to the following account:</h5></strong><br>
                                 {{-- <label class="ng-binding">Please add your identity no to your memo</label><br> --}}
                    
                    <table class="table table-bordered table-hover table-responsive">

                        <thead>

                            @if ($trx->network == 'usd')
                            <tr>
                                <th title="Account Name" class="width_20 ng-binding"><font color="orange">Account Name:</font></th>
                                <th title="Account Name" class="width_16 ng-binding">{{$a->usdaccountname}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Account Number" class="width_20 ng-binding"><font color="orange">Account Number:</font></th>
                                <th title="Account Number" class="width_16 ng-binding">{{$a->usdaccountnumber}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Bic" class="width_20 ng-binding"><font color="orange">BIC/SWIFT Code: </font></th>
                                <th title="bic" class="width_16 ng-binding">{{$a->usdswiftcode}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Bankname" class="width_20 ng-binding"><font color="orange"><font color="orange">Bank Name:</font></th>
                                <th title="bankname" class="width_16 ng-binding">{{$a->usdbankname}}</th>
                                
                            </tr>
                            <tr>
                                <th title="address" class="width_20 ng-binding"><font color="orange"><font color="orange">Bank Address:</font> </th>
                                <th title="address" class="width_16 ng-binding">{{$a->usdbankaddress}}</th>
                                
                            </tr>
                            <tr>
                                <th title="beneficiary" class="width_20 ng-binding"><font color="orange"><font color="orange">Beneficiary Address:</font> </th>
                                <th title="beneficiary" class="width_16 ng-binding"> {{$a->usdbenaddress}}</th>
                                
                            </tr>
                            <tr>
                                <th title="id" class="width_20 ng-binding"><font color="orange">Identity Number:</font> </th>
                                <th title="id" class="width_16 ng-binding"><font color="red">NFS{{$trx->id}}</font></th>
                                
                            </tr>
                            @elseif ($trx->network == 'gbp')
                            <tr>
                                <th title="Account Name" class="width_20 ng-binding"><font color="orange">Account Name:</font></th>
                                <th title="Account Name" class="width_16 ng-binding">{{$a->gbpaccountname}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Account Number" class="width_20 ng-binding"><font color="orange">Account Number:</font></th>
                                <th title="Account Number" class="width_16 ng-binding">{{$a->gbpaccountnumber}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Bic" class="width_20 ng-binding"><font color="orange">BIC/SWIFT Code: </font></th>
                                <th title="bic" class="width_16 ng-binding">{{$a->gbpswiftcode}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Bankname" class="width_20 ng-binding"><font color="orange"><font color="orange">Bank Name:</font></th>
                                <th title="bankname" class="width_16 ng-binding">{{$a->gbpbankname}}</th>
                                
                            </tr>
                            <tr>
                                <th title="address" class="width_20 ng-binding"><font color="orange"><font color="orange">Bank Address:</font> </th>
                                <th title="address" class="width_16 ng-binding">{{$a->gbpbankaddress}}</th>
                                
                            </tr>
                            <tr>
                                <th title="beneficiary" class="width_20 ng-binding"><font color="orange"><font color="orange">Beneficiary Address:</font> </th>
                                <th title="beneficiary" class="width_16 ng-binding"> {{$a->gbpbenaddress}}</th>
                                
                            </tr>
                            <tr>
                                <th title="id" class="width_20 ng-binding"><font color="orange">Identity Number:</font> </th>
                                <th title="id" class="width_16 ng-binding"><font color="red">NFS{{$trx->id}}</font></th>
                                
                            </tr>
                            @elseif ($trx->network == 'eur')

                            <tr>
                                <th title="Account Name" class="width_20 ng-binding"><font color="orange">Account Name:</font></th>
                                <th title="Account Name" class="width_16 ng-binding">{{$a->euraccountname}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Account Number" class="width_20 ng-binding"><font color="orange">Account Number:</font></th>
                                <th title="Account Number" class="width_16 ng-binding">{{$a->euraccountnumber}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Bic" class="width_20 ng-binding"><font color="orange">BIC/SWIFT Code: </font></th>
                                <th title="bic" class="width_16 ng-binding">{{$a->eurswiftcode}}</th>
                                
                            </tr>
                            <tr>
                                <th title="Bankname" class="width_20 ng-binding"><font color="orange"><font color="orange">Bank Name:</font></th>
                                <th title="bankname" class="width_16 ng-binding">{{$a->eurbankname}}</th>
                                
                            </tr>
                            <tr>
                                <th title="address" class="width_20 ng-binding"><font color="orange"><font color="orange">Bank Address:</font> </th>
                                <th title="address" class="width_16 ng-binding">{{$a->eurbankaddress}}</th>
                                
                            </tr>
                            <tr>
                                <th title="beneficiary" class="width_20 ng-binding"><font color="orange"><font color="orange">Beneficiary Address:</font> </th>
                                <th title="beneficiary" class="width_16 ng-binding"> {{$a->eurbenaddress}}</th>
                                
                            </tr>
                            <tr>
                                <th title="id" class="width_20 ng-binding"><font color="orange">Identity Number:</font> </th>
                                <th title="id" class="width_16 ng-binding"><font color="red">NFS{{$trx->id}}</font></th>
                                
                            </tr>
                            @else
                                <label class="ng-binding">Oops! something went wrong, please try again</label><br>
                            
                            @endif
                            
                        </thead>
                        
                    </table>
                    <form action="/pop" method="POST" enctype="multipart/form-data" role="form">

                        {{csrf_field()}}
                        <label class="mt-3 font-size-16 text-white ng-binding">Please add identity no to your memo, your account will not be credited if you fail to do so  </label><br> <br>
                        <label class="mt-3 font-size-16 text-white ng-binding">Please Upload transfer receipt  </label><br> <br>
                        <input type="file" accept="image/*" name="photo" required>
                        <input type="hidden" name="id" value="{{$trx->id}}">
                        
                   


                    
                </div>
                <div class="mb-3 col-lg-3" style="display: none">
                    <!-- ngIf: deposit.moneyType == 'starpayrmb' -->

                    <!-- ngIf: deposit.moneyType == 'starpayusd' || deposit.moneyType == 'otcpaysusd' --><div class="mt-3 text-danger ng-binding ng-scope" ng-if="deposit.moneyType == &#39;starpayusd&#39; || deposit.moneyType == &#39;otcpaysusd&#39;">
                        1USD≈0.9756USDT
                    </div><!-- end ngIf: deposit.moneyType == 'starpayusd' || deposit.moneyType == 'otcpaysusd' -->

                    <!-- ngIf: deposit.moneyType == 'starpayeur' || deposit.moneyType == 'starpaycad' || deposit.moneyType == 'starpaygbp' -->

                    <!-- ngIf: deposit.moneyType == 'otcpayseur' || deposit.moneyType == 'otcpayscad' || deposit.moneyType == 'otcpaysgbp' || deposit.moneyType == 'otcpaysaud' -->
                </div>
            </div>
        </div>

        <ul class="pager wizard twitter-bs-wizard-pager-link">
            <!--<li class="previous"><a href="/#" ng-click="NextStep(&#39;step2&#39;)" class="ng-binding"><i class="mdi mdi-arrow-left me-1"></i>  Previous step</a></li>-->
            <!-- ngIf: true --><br>
            <li class=""><button type="submit" class="btn btn-warning"> Already paid and confirm order <i class="mdi mdi-arrow-right ms-1"></i><!-- end ngIf: true --></button></li>
        </ul>
            </form>
                    <!-- ngInclude: '/view/common/page.html' --><div ng-include="&#39;/view/common/page.html&#39;" class="ng-scope"><!-- ngIf: pageData.total --><div class="row clearfloat ng-scope" ng-if="pageData.total">
    <!-- ngIf: pageData.totalPage>1 -->
    <!-- ngIf: pageData.totalPage>1 -->
</div><!-- end ngIf: pageData.total -->

</div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


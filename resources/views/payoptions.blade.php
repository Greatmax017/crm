@extends('layouts.app')

@section('content')
@include('sections/sidemenu')

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

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="https://crm.neptunefx.com.au/#/center/manage/BankDeposit" role="tab" ui-sref-active="active" ui-sref="center.manage.BankDeposit">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="https://crm.neptunefx.com.au/#/center/manage/ApplyWithdrawals" role="tab" ui-sref-active="active" ui-sref="center.manage.ApplyWithdrawals">
                                <span class="d-block d-sm-none"><i class="fas fa-piggy-bank"></i></span>
                                <span class="d-none d-sm-block ng-binding">Apply For Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="https://crm.neptunefx.com.au/#/center/manage/RefundRecords" role="tab" ui-sref-active="active" ui-sref="center.manage.RefundRecords">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Withdraw Records</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="https://crm.neptunefx.com.au/#/center/manage/PaymentRecords" role="tab" ui-sref-active="active" ui-sref="center.manage.PaymentRecords">
                                <span class="d-block d-sm-none"><i class="fas fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit  Records</span>
                            </a>
                        </li>
                    </ul>

                    <!-- uiView: --><div ui-view="" class="tab-content ng-scope">

<section class="mt-5 twitter-bs-wizard ng-scope">
    <div class="w-box sign-in-wr bg-5">

        <!-- ngIf: deposit.stepClass == 'step1' -->

        <!-- ngIf: deposit.stepClass == 'step2' --><div ng-if="deposit.stepClass == &#39;step2&#39;" class="ng-scope">
            <!-- ngIf: deposit.channelType=='Otcpays' || deposit.channelType=='Skrill' || deposit.channelType=='Sticpay' --><div class="row ng-scope" ng-if="deposit.channelType==&#39;Otcpays&#39; || deposit.channelType==&#39;Skrill&#39; || deposit.channelType==&#39;Sticpay&#39;">

                <!-- ngRepeat: pay in resData | filter:filterChannelType -->
                <div class="col-xxl-2 col-lg-3 col-md-4 ng-scope" ng-repeat="pay in resData | filter:filterChannelType">
                    <div class="row">
                        <a href="/usdpayamount">
                        <div class="col-xl-12 col-lg-12">
                            <div class="credit-card otcpays-method" ng-click="">
                                <div class="type-brand">
                                    <h4 class="ng-binding">BTC</h4>
                                    <img src="imgs/bitcoin.jpeg" alt="">
                                </div>
                                <div class="cc-holder-exp">
                                    <h5><input class="radios ng-pristine ng-untouched ng-valid ng-empty" type="radio" value="otcpaysusd" name="Moneytype" id="otcpaysusd_radio" ng-model="deposit.moneyType"></h5>
                                    <h6 class="ng-binding">Otcpays</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div><!-- end ngRepeat: pay in resData | filter:filterChannelType -->
                <div class="col-xxl-2 col-lg-3 col-md-4 ng-scope" ng-repeat="pay in resData | filter:filterChannelType">
                    <div class="row">
                    <a href="/usdtpayamount">
                        <div class="col-xl-12 col-lg-12">
                            <div class="credit-card otcpays-method" ng-click="">
                                <div class="type-brand">
                                    <h4 class="ng-binding">USDT-TRC20</h4>
                                    <img src="imgs/otcpaysdigital_USDT-TRC20.png" alt="">
                                </div>
                                <div class="cc-holder-exp">
                                    <h5><input class="radios ng-pristine ng-untouched ng-valid ng-empty" type="radio" value="otcpaysaud" name="Moneytype" id="otcpaysaud_radio" ng-model="deposit.moneyType"></h5>
                                    <h6 class="ng-binding">Otcpays</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                
                
                </div><!-- end ngRepeat: pay in resData | filter:filterChannelType -->
                <div class="col-xxl-2 col-lg-3 col-md-4 ng-scope" ng-repeat="pay in resData | filter:filterChannelType">
                    <div class="row">
                    <a href="/fiat/usd">
                        <div class="col-xl-12 col-lg-12">
                            <div class="credit-card otcpays-method" ng-click="">
                                <div class="type-brand">
                                    <h4 class="ng-binding">USD</h4>
                                    <img src="imgs/otcpaysusd.png" alt="">
                                </div>
                                <div class="cc-holder-exp">
                                    <h5><input class="radios ng-pristine ng-untouched ng-valid ng-empty" type="radio" value="otcpaysaud" name="Moneytype" id="otcpaysaud_radio" ng-model="deposit.moneyType"></h5>
                                    <h6 class="ng-binding">Otcpays</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                
                
                </div><!-- end ngRepeat: pay in resData | filter:filterChannelType --><div class="col-xxl-2 col-lg-3 col-md-4 ng-scope" ng-repeat="pay in resData | filter:filterChannelType">
                    <div class="row">
                    <a href="/fiat/gbp">
                        <div class="col-xl-12 col-lg-12">
                            <div class="credit-card otcpays-method" ng-click="">
                                <div class="type-brand">
                                    <h4 class="ng-binding">GBP</h4>
                                    <img src="imgs/otcpaysgbp.png" alt="">
                                </div>
                                <div class="cc-holder-exp">
                                    <h5><input class="radios ng-pristine ng-untouched ng-valid ng-empty" type="radio" value="otcpaysaud" name="Moneytype" id="otcpaysaud_radio" ng-model="deposit.moneyType"></h5>
                                    <h6 class="ng-binding">Otcpays</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                
                
                </div><!-- end ngRepeat: pay in resData | filter:filterChannelType --><div class="col-xxl-2 col-lg-3 col-md-4 ng-scope" ng-repeat="pay in resData | filter:filterChannelType">
                    <div class="row">
                    <a href="/fiat/eur">
                        <div class="col-xl-12 col-lg-12">
                            <div class="credit-card otcpays-method" ng-click="">
                                <div class="type-brand">
                                    <h4 class="ng-binding">EUR</h4>
                                    <img src="imgs/otcpayseur.png" alt="">
                                </div>
                                <div class="cc-holder-exp">
                                    <h5><input class="radios ng-pristine ng-untouched ng-valid ng-empty" type="radio" value="otcpaysaud" name="Moneytype" id="otcpaysaud_radio" ng-model="deposit.moneyType"></h5>
                                    <h6 class="ng-binding">Otcpays</h6>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                
                
                
                <!-- end ngRepeat: pay in resData | filter:filterChannelType -->
                <!-- end ngRepeat: pay in resData | filter:filterChannelType --><!-- end ngIf: deposit.channelType=='Otcpays' || deposit.channelType=='Skrill' || deposit.channelType=='Sticpay' -->
            <!-- <ul class="pager wizard twitter-bs-wizard-pager-link"> -->
                <!-- <li class="previous"><a href="javascript:;" ng-click="NextStep(&#39;step1&#39;)" class="ng-binding"><i class="mdi mdi-arrow-left me-1"></i>  Previous step</a></li> -->
                <!-- <li class="float-end">ngIf: true<a href="/" ng-if="true" ng-click="NextStep(&#39;step3&#39;)" class="ng-binding ng-scope"> Next <i class="mdi mdi-arrow-right ms-1"></i></a>end ngIf: true</li> -->
            <!-- </ul> -->
        </div><!-- end ngIf: deposit.stepClass == 'step2' -->

        <!-- ngIf: deposit.stepClass == 'step3' -->
    </div>
    <a id="posthref" target="_blank" ui-sref="payhtml" href="#"></a>
</section>
<!-- ngIf: loading -->
<div class="pay-box ng-scope">
    <div class="box-s">
        <div class="sute">支付成功？</div>
        <div class="suere">
            <a class="color-583bd4 sucess" style="" href="#">成功</a>
            <span>失败</span>
        </div>
    </div>
</div></div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


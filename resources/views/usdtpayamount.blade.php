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
                    <a href="bankdeposit" class="btn btn-success ng-binding">Deposit</a>
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
                            <a class="nav-link "  href="/records" role="tab" ui-sref-active="active" ui-sref="center.manage.PaymentRecords">
                                <span class="d-block d-sm-none"><i class="fas fa-envelope"></i></span>
                                <span class="d-none d-sm-block ng-binding">Deposit  Records</span>
                            </a>
                        </li>
                    </ul>

                    <!-- uiView: --><div ui-view="" class="tab-content ng-scope">

<section class="mt-5 twitter-bs-wizard ng-scope">
    <div class="w-box sign-in-wr bg-5">

        <!-- ngIf: deposit.stepClass == 'step1' -->

        <!-- ngIf: deposit.stepClass == 'step2' -->

        <!-- ngIf: deposit.stepClass == 'step3' --><div ng-if="deposit.stepClass == &#39;step3&#39;" valid="" id="form-body" class="formdatas ng-scope" novalidate="novalidate">
        <form valid="" action="/deposit" method="POST" class="mt-3 ng-pristine ng-valid" >
                @csrf
                <!-- ngIf: deposit.moneyType =='WireTransfer' -->



                <!-- ngIf: deposit.moneyType !='WireTransfer' -->
                <div ng-if="deposit.moneyType !=&#39;WireTransfer&#39;" class="ng-scope">
                    <div class="clearfloat">
                        <!-- ngIf: deposit.moneyType!='otcpaysdigital_BTC'
                             && deposit.moneyType!='otcpaysdigital_USDT-OMNI'
                             && deposit.moneyType!='otcpaysdigital_USDT-ERC20'
                             && deposit.moneyType!='otcpaysdigital_USDT-TRC20'
                             && deposit.moneyType!='otcpaysdigital_ETH-ERC20'
                             && deposit.moneyType!='otcpaysdigital_DOGE-COIN' --><div ng-if="deposit.moneyType!=&#39;otcpaysdigital_BTC&#39;
                             &amp;&amp; deposit.moneyType!=&#39;otcpaysdigital_USDT-OMNI&#39;
                             &amp;&amp; deposit.moneyType!=&#39;otcpaysdigital_USDT-ERC20&#39;
                             &amp;&amp; deposit.moneyType!=&#39;otcpaysdigital_USDT-TRC20&#39;
                             &amp;&amp; deposit.moneyType!=&#39;otcpaysdigital_ETH-ERC20&#39;
                             &amp;&amp; deposit.moneyType!=&#39;otcpaysdigital_DOGE-COIN&#39;" class="ng-scope">
                            <div class="mb-3 col-lg-3">

                                <label class="ng-binding">Amount（USDT）</label>
                                <input required="" ng-keyup="" data-msg-required="This field is required" autocomplete="off" chr-data="deposit" matrix-post="matrixPost" data-money="USDmoney" name="amount" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" data-rule-monneys="true" data-msg-monneys="Wrong format">
                                <input type="hidden" name="network" value="TRC20">
                            </div>
                            <div class="mb-3 col-lg-3" style="display: none">
                                <!-- ngIf: deposit.moneyType == 'starpayrmb' -->

                                <!-- ngIf: deposit.moneyType == 'starpayusd' || deposit.moneyType == 'otcpaysusd' --><div class="mt-3 text-danger ng-binding ng-scope" ng-if="deposit.moneyType == &#39;starpayusd&#39; || deposit.moneyType == &#39;otcpaysusd&#39;">
                                    1USD≈0.9756USDT
                                </div><!-- end ngIf: deposit.moneyType == 'starpayusd' || deposit.moneyType == 'otcpaysusd' -->

                                <!-- ngIf: deposit.moneyType == 'starpayeur' || deposit.moneyType == 'starpaycad' || deposit.moneyType == 'starpaygbp' -->

                                <!-- ngIf: deposit.moneyType == 'otcpayseur' || deposit.moneyType == 'otcpayscad' || deposit.moneyType == 'otcpaysgbp' || deposit.moneyType == 'otcpaysaud' -->
                            </div>
                        </div><!-- end ngIf: deposit.moneyType!='otcpaysdigital_BTC'
                             && deposit.moneyType!='otcpaysdigital_USDT-OMNI'
                             && deposit.moneyType!='otcpaysdigital_USDT-ERC20'
                             && deposit.moneyType!='otcpaysdigital_USDT-TRC20'
                             && deposit.moneyType!='otcpaysdigital_ETH-ERC20'
                             && deposit.moneyType!='otcpaysdigital_DOGE-COIN' -->
                        <!-- ngIf: deposit.moneyType=='otcpaysdigital_BTC'
                             || deposit.moneyType=='otcpaysdigital_USDT-OMNI'
                             || deposit.moneyType=='otcpaysdigital_USDT-ERC20'
                             || deposit.moneyType=='otcpaysdigital_USDT-TRC20'
                             || deposit.moneyType=='otcpaysdigital_ETH-ERC20'
                             || deposit.moneyType=='otcpaysdigital_DOGE-COIN' -->
                    </div>

                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                        <!-- <li class="previous"><a href="javascript:;" ng-click="NextStep(&#39;step2&#39;)" class="ng-binding"><i class="mdi mdi-arrow-left me-1"></i>  Previous step</a></li> -->
                        <!-- <li class="float-end"><a href="javascript:;" ng-if="true" ng-click="UnionpayNext()" class="ng-binding ng-scope"> Next <i class="mdi mdi-arrow-right ms-1"></i></a>end ngIf: true</li> -->
                        <li class=""><button type="submit" class="btn btn-primary"> Next <i class="mdi mdi-arrow-right ms-1"></i><!-- end ngIf: true --></button></li>
                    </ul>

                </div><!-- end ngIf: deposit.moneyType !='WireTransfer' -->
            
        </div><!-- end ngIf: deposit.stepClass == 'step3' -->
    </div>
    <a id="posthref" target="_blank" ui-sref="payhtml" href=""></a>
</section>
<!-- ngIf: loading -->
<div class="pay-box ng-scope">
    <div class="box-s">
        <div class="sute">支付成功？</div>
        <div class="suere">
            <a class="color-583bd4 sucess" style="" href="/records">成功</a>
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

